<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Todo Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center">
                        <a href="{{ route('category.create') }}">
                            <x-primary-button>CREATE</x-primary-button>
                        </a>

                        @if (session('success'))
                            <p class="text-green-500">{{ session('success') }}</p>
                        @endif
                        @if (session('danger'))
                            <p class="text-red-500">{{ session('danger') }}</p>
                        @endif
                    </div>
                </div>

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3">Title</th>
                                <th class="px-6 py-3">Todo</th>
                                <th class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr class="bg-white dark:bg-gray-900 border-b dark:border-gray-700">
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        <a href="{{ route('category.edit', $category) }}" class="hover:underline text-xs">
                                            {{ $category->title }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">{{ $category->todos_count }}</td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('category.destroy', $category) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:underline">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center">No categories found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
