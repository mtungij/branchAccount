<style>
.sync-status-item {
	padding: 9px 6px;
}
.sync-status-topbar-item {
	align-items: center;
	display: flex;
	padding: 0 8px;
}
.sync-status-button {
	align-items: center;
	background: #f5f7fb;
	border: 1px solid #d8dde8;
	border-radius: 4px;
	color: #344054;
	display: flex;
	font-size: 12px;
	font-weight: 600;
	gap: 6px;
	height: 32px;
	line-height: 1;
	padding: 0 9px;
	white-space: nowrap;
}
.sync-status-button:hover,
.sync-status-button:focus {
	background: #ffffff;
	color: #1d2939;
	outline: none;
	text-decoration: none;
}
.sync-status-button[disabled] {
	cursor: wait;
	opacity: .75;
}
.sync-status-dot {
	background: #98a2b3;
	border-radius: 50%;
	display: inline-block;
	height: 8px;
	width: 8px;
}
.sync-status-count {
	background: #e4e7ec;
	border-radius: 3px;
	color: #344054;
	display: none;
	font-size: 11px;
	min-width: 18px;
	padding: 3px 5px;
	text-align: center;
}
.sync-status-button.is-synced .sync-status-dot {
	background: #12b76a;
}
.sync-status-button.is-pending .sync-status-dot {
	background: #f79009;
}
.sync-status-button.is-offline .sync-status-dot,
.sync-status-button.is-error .sync-status-dot {
	background: #f04438;
}
.sync-status-button.is-syncing .sync-status-dot {
	animation: syncPulse 1s infinite;
	background: #2e90fa;
}
.sync-status-button.is-pending .sync-status-count {
	display: inline-block;
}
@keyframes syncPulse {
	0% { opacity: .35; }
	50% { opacity: 1; }
	100% { opacity: .35; }
}
@media (max-width: 767px) {
	.sync-status-text {
		display: none;
	}
	.sync-status-button {
		padding: 0 8px;
	}
}
</style>
<?php $sync_status_container = isset($sync_status_container) ? $sync_status_container : 'li'; ?>
<?php if ($sync_status_container === 'topbar'): ?>
<div class="kt-header__topbar-item sync-status-topbar-item hidden-print">
<?php elseif ($sync_status_container === 'inline'): ?>
<div class="hidden-print">
<?php else: ?>
<li class="sync-status-item hidden-print">
<?php endif; ?>
	<button
		type="button"
		class="sync-status-button"
		id="syncStatusButton"
		data-status-url="<?php echo base_url('sync/status_transactions'); ?>"
		data-push-url="<?php echo base_url('sync/push_transactions'); ?>"
		title="Sync transactions">
		<span class="sync-status-dot"></span>
		<span class="sync-status-text" id="syncStatusText">Sync</span>
		<span class="sync-status-count" id="syncStatusCount">0</span>
	</button>
<?php if ($sync_status_container === 'topbar' || $sync_status_container === 'inline'): ?>
</div>
<?php else: ?>
</li>
<?php endif; ?>
<script>
(function () {
	var button = document.getElementById('syncStatusButton');
	if (!button || button.dataset.ready === '1') {
		return;
	}

	button.dataset.ready = '1';
	var text = document.getElementById('syncStatusText');
	var count = document.getElementById('syncStatusCount');
	var statusUrl = button.getAttribute('data-status-url');
	var pushUrl = button.getAttribute('data-push-url');
	var syncing = false;

	function setState(state, label, pending) {
		button.className = 'sync-status-button is-' + state;
		button.disabled = state === 'syncing';
		text.textContent = label;
		count.textContent = pending || 0;
		button.title = label;
	}

	function requestJson(url) {
		return fetch(url, {
			credentials: 'same-origin',
			headers: { 'X-Requested-With': 'XMLHttpRequest' }
		}).then(function (response) {
			return response.json().then(function (data) {
				if (!response.ok || !data.success) {
					throw new Error(data.message || 'Sync request failed.');
				}
				return data;
			});
		});
	}

	function refreshStatus(autoPush) {
		if (!navigator.onLine) {
			setState('offline', 'Offline', 0);
			return Promise.resolve();
		}

		return requestJson(statusUrl).then(function (data) {
			var pending = parseInt(data.pending || 0, 10);
			if (pending > 0) {
				setState('pending', 'Pending', pending);
				if (autoPush) {
					return pushNow();
				}
			} else {
				setState('synced', 'Synced', 0);
			}
		}).catch(function () {
			setState('error', 'Sync error', 0);
		});
	}

	function pushNow() {
		if (syncing || !navigator.onLine) {
			if (!navigator.onLine) {
				setState('offline', 'Offline', 0);
			}
			return Promise.resolve();
		}

		syncing = true;
		setState('syncing', 'Syncing', 0);

		return requestJson(pushUrl).then(function (data) {
			var pending = parseInt(data.pending || 0, 10);
			if (parseInt(data.failed || 0, 10) > 0) {
				setState('error', 'Sync error', pending);
			} else {
				setState('synced', 'Synced', 0);
			}
		}).catch(function () {
			setState('error', 'Sync error', 0);
		}).then(function () {
			syncing = false;
			return refreshStatus(false);
		});
	}

	button.addEventListener('click', function () {
		pushNow();
	});
	window.addEventListener('online', function () {
		refreshStatus(true);
	});
	window.addEventListener('offline', function () {
		setState('offline', 'Offline', 0);
	});

	refreshStatus(true);
	window.setInterval(function () {
		refreshStatus(true);
	}, 60000);
})();
</script>
