# Customer Notification System - Documentation

## Overview
A complete notification and advertisement system that allows admins to broadcast messages to customers through their dashboard.

## Features Implemented

### 1. Database Tables
- **tbl_notifications**: Stores all notifications/advertisements
- **tbl_notification_reads**: Tracks which customers have read which notifications

### 2. Customer Portal Features
- Notifications display on customer dashboard
- Unread badge counter showing number of new notifications
- Color-coded notification types (Info, Warning, Success, Promotion)
- Mark as read functionality via AJAX
- Responsive design for mobile/tablet/desktop

### 3. Admin Management Interface
- View all notifications in a DataTable
- Create new notifications with:
  - Title and message
  - Type (Info/Warning/Success/Promotion)
  - Target audience (All customers/Active loans/Completed loans)
  - Start and end dates for scheduling
  - Active/Inactive status
- Edit existing notifications
- Delete notifications
- Toggle notification status (activate/deactivate)

## How to Use

### For Admin:

1. **Access Notification Manager**
   - Navigate to: `http://yoursite.com/admin/customer_notifications`
   
2. **Create New Notification**
   - Click "Create New Notification" button
   - Fill in the form:
     * **Title**: Short headline (e.g., "Payment Reminder")
     * **Message**: Full notification text
     * **Type**: 
       - Info (Blue) - General information
       - Warning (Yellow) - Important alerts
       - Success (Green) - Positive news
       - Promotion (Purple) - Special offers
     * **Target Audience**:
       - All Customers - Everyone sees it
       - Active Loans - Only customers with active loans
       - Completed Loans - Only customers who completed loans
     * **Start Date**: When notification becomes visible
     * **End Date**: When notification stops showing
   - Click "Create Notification"

3. **Edit Notification**
   - Click the Edit icon (blue button) on any notification
   - Update fields as needed
   - Click "Update Notification"

4. **Delete Notification**
   - Click the Delete icon (red button)
   - Confirm deletion
   - All read records are automatically deleted

5. **Activate/Deactivate**
   - Click the power icon to toggle status
   - Inactive notifications won't show to customers

### For Customers:

1. **View Notifications**
   - Login to customer portal: `http://yoursite.com/customer`
   - Notifications appear at the top of dashboard
   - Unread notifications have a "New" badge
   - Color-coded by type

2. **Mark as Read**
   - Click "Mark as Read" button on any notification
   - Notification becomes semi-transparent
   - Unread count decreases

## Notification Types & Use Cases

### Info (Blue)
- General announcements
- System updates
- Company news
Example: "New office hours: Monday to Friday, 8 AM - 5 PM"

### Warning (Yellow)
- Payment reminders
- Important deadlines
- Account alerts
Example: "Your loan payment is due in 3 days"

### Success (Green)
- Congratulations messages
- Achievements
- Positive updates
Example: "Congratulations! You've completed your loan payment"

### Promotion (Purple)
- Special offers
- Marketing campaigns
- New products/services
Example: "Get 10% off on your next loan application!"

## Database Schema

### tbl_notifications
```sql
- notification_id (Primary Key)
- comp_id (Company ID)
- title (VARCHAR 255)
- message (TEXT)
- notification_type (ENUM: info, warning, success, promotion)
- target_audience (ENUM: all, active_loans, completed_loans, specific)
- is_active (TINYINT: 1=active, 0=inactive)
- start_date (DATE)
- end_date (DATE)
- created_by (Admin ID)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
```

### tbl_notification_reads
```sql
- read_id (Primary Key)
- notification_id (Foreign Key)
- customer_id (Customer ID)
- read_at (TIMESTAMP)
- UNIQUE(notification_id, customer_id) - Prevents duplicate reads
```

## Controller Methods

### Customer Controller
- `dashboard()` - Loads notifications for customer
- `mark_notification_read($notification_id)` - AJAX endpoint to mark as read

### Admin Controller
- `customer_notifications()` - Display management page
- `create_customer_notification()` - Create new notification
- `edit_customer_notification()` - Update notification
- `delete_customer_notification($notification_id)` - Delete notification
- `toggle_notification_status($notification_id)` - Activate/deactivate

### Model Methods (Queries.php)
- `get_customer_notifications($customer_id, $comp_id)` - Get customer's notifications
- `get_unread_notification_count($customer_id, $comp_id)` - Count unread
- `mark_notification_read($notification_id, $customer_id)` - Mark as read
- `create_notification($data)` - Create notification
- `get_all_notifications($comp_id)` - Get all for admin
- `update_notification($notification_id, $data)` - Update notification
- `delete_notification($notification_id)` - Delete notification
- `get_notification_by_id($notification_id)` - Get single notification

## Files Modified/Created

### Controllers
- `/application/controllers/Customer.php` - Added mark_notification_read()
- `/application/controllers/Admin.php` - Added 5 notification management methods

### Models
- `/application/models/Queries.php` - Added 8 notification query methods

### Views
- `/application/views/customer/dashboard.php` - Added notification display section
- `/application/views/admin/customer_notifications.php` - Created admin management page

### Database
- `tbl_notifications` - Created
- `tbl_notification_reads` - Created

## Testing Guide

1. **As Admin:**
   - Login to admin panel
   - Go to customer notifications page
   - Create a test notification with type "info"
   - Set target audience to "All Customers"
   - Set start date to today, end date to next week

2. **As Customer:**
   - Login to customer portal
   - Check dashboard for notification
   - Verify "New" badge appears
   - Click "Mark as Read"
   - Verify notification becomes semi-transparent
   - Verify unread count decreases

3. **Test Filtering:**
   - Create notification for "Active Loans" only
   - Login with customer who has active loan (should see it)
   - Login with customer without active loan (should not see it)

## Troubleshooting

**Notifications not showing:**
- Check if notification is active (is_active = 1)
- Verify start_date is today or past
- Verify end_date is today or future
- Check target_audience matches customer status

**Mark as Read not working:**
- Check browser console for JavaScript errors
- Verify URL routing for customer/mark_notification_read
- Check database for duplicate read entries

**Admin page not loading:**
- Verify admin session is active
- Check if Queries model is loaded
- Verify database tables exist

## Future Enhancements (Optional)

- Email notifications when new announcement is posted
- SMS notifications for urgent warnings
- Rich text editor for formatting messages
- Image attachments for promotional notifications
- Notification templates for common messages
- Scheduled auto-posting for future campaigns
- Analytics dashboard showing read rates

## Support

For issues or questions:
- Check error logs in `/application/logs/`
- Verify database structure matches schema
- Ensure all files have correct permissions
- Check PHP and MySQL versions compatibility
