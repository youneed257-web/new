# Net Data CRUD - TALL Stack

This document explains the implementation of the **Net Data** CRUD interface using the TALL stack (Tailwind, Alpine, Laravel, Livewire). It mirrors patterns used for permission and role management.

## Files created/modified

- `app/Models/Netdata.php` – Eloquent model representing `netdata` table.
- `app/Livewire/NetdataCrud.php` – Livewire component containing business logic.
- `resources/views/livewire/netdata-crud.blade.php` – Component view with listing and modal form.
- `resources/views/mainnet/net.blade.php` – Wrapper view now renders `<livewire:netdata-crud />`.
- `routes/web.php` – Added comments and alias route `netdata.index` pointing to the same view.
- (existing migration `2026_03_05_153205_create_netdata_table.php` was migrated earlier).

## Component overview

### Properties
- `room`, `isp`, `dia_ip`: required strings.
- `bandwidth`, `ip_address`, `gateway`, `ip_public`: optional strings.
- `$isEditing`, `$netId`, `$showForm` for modal state.

### Methods
- `render()` – returns all netdata records.
- `createNew()` – resets fields and opens form.
- `edit($id)` – loads record into form for editing.
- `save()` – validates fields; creates or updates record.
- `delete($id)` – removes a record.
- `closeForm()` – resets state and validation.

### Validation
Rules are defined in `save()` with `required|string` or `nullable|string`.

## User interface

- Listing table with pagination-ready layout.
- Modal form for create/edit; fields lazily validated.
- Create/Edit/Delete buttons with confirmation for deletes.
- Total count display and descriptive header.

## Routes

```php
// network data page
Route::get('mainnet', fn() => view('mainnet.net'))->name('mainnet');
Route::get('netdata', fn() => view('mainnet.net'))->name('netdata.index');
```

Both URLs render the same Livewire component; the second route is a more semantic alias.

## Usage
1. Run `php artisan migrate` (already executed for the migration file).
2. Navigate to `/mainnet` or `/netdata` after logging in.
3. Use the interface to add, edit, or remove net data entries.

## Notes
- Model `$fillable` configured for mass assignment.
- Navigation link added to layout under "Data Internet".
- Styling and modal behavior replicate existing permission/role views.

---

Feel free to adapt field labels or validation to match business rules.