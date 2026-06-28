Goal
Create a simple task manager using Laravel + Livewire Volt + Eloquent + MySQL.
Requirements
Implement the following:
1. Migration
Create a migration for a `tasks` table with these columns:

* id
* title (string)
* completed (boolean, default false)
* created_at
* updated_at
Do not add any extra columns.
2. Eloquent Model
Create:
`App\Models\Task`
Requirements:

* Uses Eloquent
* `$fillable` contains:
   * `title`
   * `completed`
No unnecessary code.
3. Volt Component
Create a single-file Volt component:
`resources/views/livewire/tasks.blade.php`
The component must contain:
Public Property

```php
public string $title = '';

```

Method: addTask()
Requirements:

* Validate:

```php
'title' => 'required|string|max:255'

```

* Reject empty titles.
* Create the task.
* Reset `$title` back to an empty string.
Method: toggle($id)
Requirements:

* Find the task by ID.
* Flip the `completed` boolean.
* Save the task.
4. UI
Keep the UI intentionally simple.
Display:

* Input field bound to `$title`
* Add Task button
* Validation error under the input
* List every task
* Checkbox for each task
* Clicking the checkbox calls `toggle($id)`
* Completed tasks should appear struck through using a CSS class like `line-through`.
No styling frameworks are required.
5. Routing
Register the Volt component at:

```
/tasks

```

The route should render the `tasks` Volt component.
6. Code Quality
Please:

* Follow Laravel 12 conventions.
* Use Volt's functional syntax.
* Keep the implementation clean and minimal.
* Do not create unnecessary controllers, services, repositories, DTOs, traits, helpers, or components.
* Avoid overengineering.
* Use Eloquent directly.
* Use proper validation.
* Keep the code readable.
7. Deliverables
Generate the complete code for:

* migration
* Task model
* `resources/views/livewire/tasks.blade.php`
* route registration
Include the full contents of each file.
Do not omit any imports or namespaces.
Ensure the code is immediately runnable.