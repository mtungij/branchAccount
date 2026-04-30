-- Sample Customer Notifications
-- Replace 'YOUR_COMP_ID' with your actual company ID
-- Replace 'YOUR_ADMIN_ID' with your actual admin employee ID

-- Sample 1: General Information
INSERT INTO tbl_notifications (comp_id, title, message, notification_type, target_audience, is_active, start_date, end_date, created_by, created_at)
VALUES (
    1, -- YOUR_COMP_ID
    'Welcome to Customer Portal',
    'You can now view your loan details, payment history, and make payments through this portal. For any assistance, contact our support team.',
    'info',
    'all',
    1,
    CURDATE(),
    DATE_ADD(CURDATE(), INTERVAL 30 DAY),
    1, -- YOUR_ADMIN_ID
    NOW()
);

-- Sample 2: Payment Reminder
INSERT INTO tbl_notifications (comp_id, title, message, notification_type, target_audience, is_active, start_date, end_date, created_by, created_at)
VALUES (
    1, -- YOUR_COMP_ID
    'Payment Reminder',
    'This is a friendly reminder that your monthly loan payment is due soon. Please ensure timely payment to avoid penalties. You can check your payment schedule in the dashboard below.',
    'warning',
    'active_loans',
    1,
    CURDATE(),
    DATE_ADD(CURDATE(), INTERVAL 7 DAY),
    1, -- YOUR_ADMIN_ID
    NOW()
);

-- Sample 3: Congratulations Message
INSERT INTO tbl_notifications (comp_id, title, message, notification_type, target_audience, is_active, start_date, end_date, created_by, created_at)
VALUES (
    1, -- YOUR_COMP_ID
    'Thank You for Your Trust!',
    'Congratulations on successfully completing your loan payment! We appreciate your commitment and trust in our services. You are now eligible for a higher loan amount.',
    'success',
    'completed_loans',
    1,
    CURDATE(),
    DATE_ADD(CURDATE(), INTERVAL 60 DAY),
    1, -- YOUR_ADMIN_ID
    NOW()
);

-- Sample 4: Special Promotion
INSERT INTO tbl_notifications (comp_id, title, message, notification_type, target_audience, is_active, start_date, end_date, created_by, created_at)
VALUES (
    1, -- YOUR_COMP_ID
    'Special Offer: Reduced Interest Rate!',
    'Apply for a new loan this month and enjoy a 2% reduced interest rate! This offer is valid until the end of the month. Contact us today to learn more.',
    'promotion',
    'all',
    1,
    CURDATE(),
    DATE_ADD(CURDATE(), INTERVAL 15 DAY),
    1, -- YOUR_ADMIN_ID
    NOW()
);

-- Sample 5: System Maintenance
INSERT INTO tbl_notifications (comp_id, title, message, notification_type, target_audience, is_active, start_date, end_date, created_by, created_at)
VALUES (
    1, -- YOUR_COMP_ID
    'Scheduled Maintenance Notice',
    'Our system will undergo scheduled maintenance on Sunday, 2:00 AM - 4:00 AM. The customer portal may be temporarily unavailable during this time. We apologize for any inconvenience.',
    'warning',
    'all',
    1,
    CURDATE(),
    DATE_ADD(CURDATE(), INTERVAL 5 DAY),
    1, -- YOUR_ADMIN_ID
    NOW()
);

-- Sample 6: New Feature Announcement
INSERT INTO tbl_notifications (comp_id, title, message, notification_type, target_audience, is_active, start_date, end_date, created_by, created_at)
VALUES (
    1, -- YOUR_COMP_ID
    'New Feature: Mobile Payments!',
    'We are excited to announce that you can now make loan payments directly through your mobile phone! Check out the new payment options in your dashboard.',
    'info',
    'active_loans',
    1,
    CURDATE(),
    DATE_ADD(CURDATE(), INTERVAL 20 DAY),
    1, -- YOUR_ADMIN_ID
    NOW()
);

-- Verify inserted notifications
SELECT 
    notification_id,
    title,
    notification_type,
    target_audience,
    is_active,
    start_date,
    end_date
FROM tbl_notifications
WHERE comp_id = 1 -- YOUR_COMP_ID
ORDER BY created_at DESC;
