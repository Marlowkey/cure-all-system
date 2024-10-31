@props(['users']) <!-- Accept an array of users -->

<div class="card-body">
    <!-- Bootstrap table-responsive class makes the table scrollable on small devices -->
    <div class="table-responsive">
        <table class="table table-bordered w-100" id="dataTable" cellspacing="0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <!-- Hide 'Username' on smaller screens, show on medium and up -->
                    <th class="d-none d-md-table-cell">Username</th>
                    <th>Contacts</th>
                    <th style="width: 15%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user) <!-- Loop through the users array -->
                <tr>
                    <td>{{ $user->name ?? '-' }}</td>
                    <td>{{ $user->email ?? '-' }}</td>
                    <!-- Hide 'Username' on mobile, visible on medium screens and up -->
                    <td class="d-none d-md-table-cell">{{ $user->username ?? '-' }}</td>
                    <td>{{ $user->contact_num ?? '-' }}</td>
                    <td>
                        <!-- Flexbox utilities: stack buttons vertically on small screens, inline on larger screens -->
                        <div class="d-flex flex-column flex-sm-row">
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary btn-sm me-sm-2 mb-2 mb-sm-0">View</a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm mb-2 mb-sm-0">Edit</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
