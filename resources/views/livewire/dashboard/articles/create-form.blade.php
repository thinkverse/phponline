<form wire:submit.prevent="submit" class="space-y-8 divide-y divide-gray-200">
    <div class="space-y-8 divide-y divide-gray-200">
        <div>
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Publish
                </h3>
                <p class="mt-1 text-sm text-gray-500">
                    Create a new Article
                </p>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">
                        Title
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input wire:model="title" type="text" name="title" id="title" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                    </div>
                </div>

                <div class="sm:col-span-6">
                    <label for="excerpt" class="block text-sm font-medium text-gray-700">
                        Excerpt
                    </label>
                    <div class="mt-1">
                        <textarea wire:model="excerpt" id="excerpt" name="excerpt" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">Please make sure this is no longer than 120 characters.</p>
                </div>

                <div class="sm:col-span-6">
                    <label for="content" class="block text-sm font-medium text-gray-700">
                        Content
                    </label>
                    <div class="mt-1">
                        <textarea wire:model="content" id="content" name="content" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">Write your article here.</p>
                </div>

                <div class="sm:col-span-3">
                    <label for="category" class="block text-sm font-medium text-gray-700">
                        Category
                    </label>
                    <div class="mt-1">
                        <select wire:model="category" id="category" name="category" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            <option value>Please select ...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category['id'] }}">
                                    {{ $category['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="pt-5">
        <div class="flex justify-end">
            <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Cancel
            </button>
            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>
    </div>
</form>
