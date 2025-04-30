<div class="h-screen grid place-items-center">
    <div class="w-96">
            <h2 class="text-2xl text-slate-700 mb-8 text-center">Login as Admin</h2>
        <form action="/login" method="POST" class="space-y-6">
            <div class="flex flex-col">
                <label for="email" class="text-sm text-gray-700 mb-2">Enter username</label>
                <input type="email" name="email" id="email" placeholder="Enter your E-mail" autocomplete="email" class="border border-gray-300 p-2 rounded-lg text-sm" required="required" />
            </div>
            <div class="flex flex-col">
                <label for="password" class="text-sm text-gray-700 mb-2">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your Password" class="border border-gray-300 p-2 rounded-lg text-sm"
                required="required" />
            </div>
            <a href="#" class="inline-block underline text-yellow-500 text-sm">Forgot Password</a>
            <button class="block bg-yellow-600 text-white py-2 px-4 rounded-lg cursor-pointer hover:bg-yellow-700 text-sm" type="submit" name="upload">Sign In</button>
        </form>
    </div>
</div>
