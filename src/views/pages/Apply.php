<main>
    <h1 class="text-3xl font-bold underline">Apply</h1>
<form action="apply" method="POST" class="mt-4 space-y-6 bg-white p-6 rounded-lg shadow-md max-w-md mx-auto">
    <div class="flex flex-col">
        <label for="fullname" class="text-sm font-medium text-gray-700 mb-1">Full Name:</label>
        <input type="text" id="fullname" name="fullname" required class="border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" placeholder="Enter your full name">
    </div>
    <div class="flex flex-col">
        <label for="school" class="text-sm font-medium text-gray-700 mb-1">School</label>
            <input type="text" id="school" name="school" id="school"
                required class="border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" placeholder="Enter your school">
    </div>
    <div class="flex flex-col">
        <label for="email" class="text-sm font-medium text-gray-700 mb-1">Email:</label>
        <input type="email" id="email" name="email" required class="border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" placeholder="Enter your email">
    </div>
    <div class="flex flex-col">
        <label for="phone" class="text-sm font-medium text-gray-700 mb-1">Phone:</label>
        <input type="tel" id="phone" name="phone" required class="border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" placeholder="Enter your phone number">
    </div>
    <div class="flex flex-col">
        <label for="speciality" class="text-sm font-medium text-gray-700 mb-1">Speciality:</label>
        <input type="text" id="speciality" name="speciality" required class="border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" placeholder="Enter your speciality">
    </div>
    <div class="flex flex-col">
        <label for="referral" class="text-sm font-medium text-gray-700 mb-1">Referral:</label>
        <input type="text" id="referral" name="referral" class="border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" placeholder="Enter referral (if any)">
    </div>
    <div class="flex flex-col">
        <label for="comments" class="text-sm font-medium text-gray-700 mb-1">Comments:</label>
        <textarea id="comments" name="comments" class="border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" placeholder="Enter additional comments"></textarea>
    </div>
    <div>
        <button type="submit" class="w-full bg-yellow-500 text-white font-medium py-2 px-4 rounded-md hover:bg-yellow-600 focus:ring-2 focus:ring-yellow-500 focus:outline-none">Submit</button>
    </div>
</form>
</main>
