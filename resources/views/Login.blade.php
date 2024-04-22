<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
  <style>
    /* Add any custom CSS here */
  </style>
</head>
<body class="bg-gray-100 font-sans">
  <div class="flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-md w-full">
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Login</h2>
      <form action="{{route('Login')}}" method="POST">
        @csrf
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="email">
            Email
          </label>
          <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="email"
            name="email"
            type="email"
            placeholder="Enter your email"
          >
          @error('email')
          <span class="text-red-500"> {{$message}}</span>
       @enderror
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 font-bold mb-2" for="password">
            Password
          </label>
          <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
            id="password"
            name="password"
            type="password"
            placeholder="Enter your password"
          >
          @error('password')
          <span class="text-red-500"> {{$message}}</span>
       @enderror
       @error('custom_error')
       <span class="text-red-500">{{ $message }}</span>
   @enderror
   
     
       
        </div>

        <div class="flex items-center justify-between">
          <button
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit"
          >
            Login
          </button>
          <a
            class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
            href="/forgot"
          >
            Forgot Password?
          </a>
        </div>
        @if (session('message'))
        <div class="alert text-red-500 text-xl">
          {{ session('message') }}
        </div>
        @endif
      </form>
      <div class="mt-4 text-center"> 
        <a
          href="/"
          class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
        >
        Or click here to  Register Now
        </a>
      </div>
    </div>
  </div>

  <script>
    // Add any custom JavaScript here
  </script>
</body>
</html>