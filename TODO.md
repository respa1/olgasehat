# TODO: Implement Pending Status for Pemiliklapangan Registration and Verification

## Current Task: Ensure pemiliklapangan registrations set User status to 'pending', prevent login until super admin verifies and sets to 'approved'.

1. [x] Edit `app/Http/Controllers/MitraController.php` - In `store()` method: Add `'status' => 'pending'` to the User::create() array.
2. [x] Edit `app/Http/Controllers/MitraController.php` - In `verify($id)` method: Change Mitra update to `'status' => 'approved'`, and add `$mitra->user->update(['status' => 'approved'])` to sync User status.
3. [ ] Test: Register a new pemiliklapangan, verify status 'pending' in DB, attempt login (should fail), verify as super admin, check status 'approved', login (should succeed).

After completing these, the feature will be fully implemented.

After completing these, the feature will be fully implemented.
