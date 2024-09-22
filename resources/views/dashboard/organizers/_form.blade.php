<div class="form-group">
    <x-form.label for="name" label="Organizer Name" />
    <x-form.input  name="name" type="text" :vlaue="$organizer->name"   />
</div>
<div class="form-group">
    <x-form.label for="email" label="Organizer email" />
    <x-form.input  name="email" type="text" :vlaue="$organizer->email"   />
</div>

<div class="form-group">
    <x-form.label for="password" label="Organizer Password" />
    <x-form.input  name="password"   />
</div>

<div class="form-group">
    <x-form.label label="Organizer Type" />
    <select name="type" class="form-control form-select">
        <option value="Team">Team</option>
        <option value="Mentor">Mentor</option>
    </select>
</div>

<div class="form-group">
    <x-form.label label="Role" />
    <select name="role_id" class="form-control form-select">
        @foreach(\App\Models\Role\Role::all() as $role)
            <option value="{{ $role->id }}" >{{ $role->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button_label }}</button>
</div>
