<div class="flex flex-col items-center justify-center h-screen">
    <h1 class="text-4xl font-bold">Pay</h1>
    <!-- payment form -->
    <form action="/payment" method="POST" class="w-full max-w-md p-4 bg-white rounded shadow-md">
        <div class="mb-4">
            <label for="applicant_id" class="block text-gray-700 text-sm font-bold mb-2">Applicant ID</label>
            <input type="text" name="applicant_id" id="applicant_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter applicant ID">
        </div>
        <div class="mb-4">
            <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Amount</label>
            <input type="number" name="amount" id="amount" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter amount">
        </div>
        <div class="mb-4">
            <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Momo number</label>
            <input type="tel" name="phone" id="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter amount">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter description"></textarea>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Pay</button>
        </div>
    </form>
</div>
