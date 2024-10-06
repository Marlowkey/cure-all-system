@props(['users']) <!-- Accept an array of users -->

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered w-100" id="dataTable" cellspacing="0">
            <thead>
                <tr>
                    <th >Name</th>
                    <th >Email</th>
                    <th >Username</th>
                    <th >Contacts</th>
                    <th  style="width: 15%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user) <!-- Loop through the users array -->
                <tr>
                    <td >{{ $user->name ?? '-'}}</td>
                    <td >{{ $user->email ?? '-'}}</td>
                    <td >{{ $user->username  ?? '-'}}</td>
                    <td >{{ $user->contact_num ?? '-' }}</td>
                    <td>
                        <div class="d-flex flex-wrap justify-content-start">
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary btn-sm me-2 mb-2">View</a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm mb-2">Edit</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
