<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .bg-gradient {
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body class="bg-gradient min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-8">
        <h2 class="text-2xl font-bold text-center mb-6">Verify OTP</h2>
        <form action="{{ route('checkOtp') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="otp">
                    Enter OTP
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="otp"
                    name="otp"
                    type="text"
                    placeholder="Enter OTP"
                    required
                >
                @error('Success')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-center">
                <button
                    class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline transition duration-300"
                    type="submit"
                >
                    Verify OTP
                </button>
            </div>
        </form>
    </div>
</body>
</html>