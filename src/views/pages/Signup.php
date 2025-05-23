<main class="flex flex-col items-center justify-center min-h-screen bg-gray-100 p-4">
    <h3 class="font-bold text-3xl text-slate-600 text-center">Sign up</h3>
    <form action="/signup" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow-md max-w-md w-full mt-4">
        <div class="flex flex-col">
            <label for="username" class="text-sm text-gray-700 mb-2">Enter username</label>
            <input
                type="text"
                name="name"
                id="username"
                placeholder="Enter your username"
                class="border border-gray-300 p-2 rounded-lg text-sm" 
                required
            />
        </div>
        <div class="flex flex-col">
            <label for="email" class="text-sm text-gray-700 mb-2">Enter email</label>
            <input
                type="email"
                name="email"
                id="email"
                placeholder="Enter your E-mail"
                autocomplete="email"
                class="border border-gray-300 p-2 rounded-lg text-sm" 
                required
            />
        </div>
        <div class="flex flex-col">
            <label for="password" class="text-sm text-gray-700 mb-2">Password</label>
            <input
                type="password"
                name="password"
                id="password"
                placeholder="Enter your Password"
                class="border border-gray-300 p-2 rounded-lg text-sm"
                required="required" />
        </div>
        <button
            class="block bg-yellow-600 text-white py-2 px-4 rounded-lg cursor-pointer hover:bg-yellow-700 text-sm"
            type="submit"
            name="upload"
        >
            Sign Up
        </button>
</main>
