<div class="d-flex justify-content-end my-4 ">
    <a href="{{ route('medicines.create') }}" class="btn btn-sm btn-success">
        <i class="fa-solid fa-plus"></i> Add Medicine
    </a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Code</th>  <!-- Added Code column -->
            <th scope="col">Brand</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>  <!-- Added Quantity column -->
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($medicines as $medicine)
            <tr>
                <td>
                    <img src="{{ Str::startsWith($medicine->image_path, 'http') ? $medicine->image_path : asset('storage/' . $medicine->image_path) }}"
                    alt="{{ $medicine->name }}" style="width: 50px; height: 50px;">                </td>
                <td>{{ $medicine->name }}</td>
                <td>{{ $medicine->code }}</td>  <!-- Displaying Code -->
                <td>{{ $medicine->brand }}</td>
                <td>₱{{ number_format($medicine->price, 2) }}</td>
                <td>{{ $medicine->quantity }}</td>  <!-- Displaying Quantity -->
                <td>
                    <!-- Edit Medicine -->
                    <a href="{{ route('medicines.edit', $medicine->id) }}" class="btn btn-sm btn-warning">
                        <i class="fa-solid fa-pencil"></i> Edit
                    </a>

                    <!-- Delete Medicine -->
                    <form action="{{ route('medicines.destroy', $medicine->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                            <i class="fa-solid fa-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<nav class="d-flex justify-content-center">
    <ul class="pagination">
        {{ $medicines->links() }}
    </ul>
</nav>
