@props(['users']) <!-- Accept an array of users -->

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered w-100" id="dataTable" cellspacing="0">
            <thead>
                <tr>
                    <th class="h4">Name</th>
                    <th class="h4">Email</th>
                    <th class="h4">Username</th>
                    <th class="h4">Contact</th>
                    <th class="h4" style="width: 15%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user) <!-- Loop through the users array -->
                <tr>
                    <td class="h5">{{ $user->name }}</td>
                    <td class="h5">{{ $user->email }}</td>
                    <td class="h5">{{ $user->username }}</td>
                    <td class="h5">{{ $user->contact }}</td>
                    <td>
                        <div class="d-flex flex-wrap justify-content-start">
                            <button class="btn btn-primary btn-lg me-2 mb-2">View</button>
                            <button class="btn btn-warning btn-lg mb-2">Edit</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
