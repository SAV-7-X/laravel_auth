<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
  <style>
    /* Add any custom CSS here */
  </style>
</head>
<body class="bg-gray-100 font-sans">
  <div class="flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-2xl w-full">
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Edit Profile</h2>
      <form action="{{ route('edit') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-gray-700 font-bold mb-2" for="name">
              Name
            </label>
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="name"
              name="name"
              type="text"
              value="{{ $user->name}}"
            >
            @error('name')
            <span class="text-red-500"> {{$message}}</span>
        @enderror
          </div>
          <div>
            <label class="block text-gray-700 font-bold mb-2" for="email">
              Email
            </label>
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="email"
              name="email"
              type="email"
              value="{{ $user->email}}"
            >
            @error('email')
            <span class="text-red-500"> {{$message}}</span>
         @enderror
          </div>
        </div>
        <div class="mt-6">
          <label class="block text-gray-700 font-bold mb-2" for="password">
            New Password (leave blank to keep the same)
          </label>
          <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="password"
            name="password"
            type="password"
            placeholder="Enter a new password"
          >
          @error('password')
          <span class="text-red-500"> {{$message}}</span>
       @enderror
        </div>
        <div class="mt-6">
          <label class="block text-gray-700 font-bold mb-2" for="password_confirmation">
            Confirm New Password
          </label>
          <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="password_confirmation"
            name="password_confirmation"
            type="password"
            placeholder="Confirm your new password"
          >
        </div>
        <div class="mt-8 flex justify-end">
          <button
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit"
          >
            Update Profile
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>
    // Add any custom JavaScript here
  </script>
</body>
</html>