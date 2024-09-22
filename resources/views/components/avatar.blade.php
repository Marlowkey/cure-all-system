@props(['user_image'])

<img src="{{ $user_image ? asset('storage/' . $user_image) : 'https://mdbcdn.b-cdn.net/img/new/avatars/2.webp' }}"
     class="rounded-circle mb-3 border border-primary border-4"
     style="width: 215px;"
     alt="Avatar" />
