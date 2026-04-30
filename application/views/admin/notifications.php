<h2>Notification Numbers</h2>
<a href="<?= site_url('admin/create') ?>">+ Add New</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Phone Number</th>
        <th>Position</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($numbers as $row): ?>
    <tr>
        <td><?= $row->id ?></td>
        <td><?= $row->phone_number ?></td>
        <td><?= ucfirst($row->position) ?></td>
        <td><?= $row->status ? 'Active' : 'Inactive' ?></td>
        <td>
            <a href="<?= site_url('notification/edit/'.$row->id) ?>">Edit</a> | 
            <a href="<?= site_url('notification/delete/'.$row->id) ?>" onclick="return confirm('Delete this number?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
