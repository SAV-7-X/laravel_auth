<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f0f0f0;
    }
  </style>
</head>
<body>
  <div class="flex justify-center items-center h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
      <h2 class="text-2xl font-bold mb-4 text-center">Register</h2>
      <form action="{{ route('Register') }}" method="POST">
        @csrf
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
          <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your name" required>
          <span class="text-red-500 text-wrap w-full">
            @error('name') {{ $message }} @enderror
          </span>
        </div>
        <div class="mb-4">
          <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
          <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your email" required>
          <span class="text-red-500 text-wrap w-full">
            @error('email') {{ $message }} @enderror
          </span>
        </div>
        <div class="mb-4">
          <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
          <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your password" required>
          <span class="text-red-500 text-wrap w-full">
            @error('password') {{ $message }} @enderror
          </span>
        </div>
        <div class="mb-4">
          <label for="confirm-password" class="block text-gray-700 font-bold mb-2">Confirm Password</label>
          <input type="password" id="confirm-password" name="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Confirm your password" required>
        </div>
        <div class="flex items-center justify-between">
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Register
          </button>
          <a href="{{ route('login') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
            Login
          </a>
        </div>
      </form>
    
    </div>
  </div>

  <script>
    // Add JavaScript validation here
  </script>
</body>
</html>