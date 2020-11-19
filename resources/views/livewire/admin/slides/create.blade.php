<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

      <div class="inline-block align-bottom bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <form class="w-full p-6">
          <div class="bg-white flex flex-wrap -mx-3 mb-6 text-left">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
              <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
              <input type="text" class="form-input block w-full mt-1" id="title" placeholder="Enter Title" wire:model="title">
              @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
              <label for="page" class="block text-gray-700 text-sm font-bold mb-2">Page:</label>
              <input type="text" class="form-input block w-full mt-1" id="page" wire:model="page" placeholder="Enter Page"/>
              @error('page') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
          </div>
          <div class="flex flex-wrap -mx-3 mb-2">
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label for="duration" class="block text-gray-700 text-sm font-bold mb-2">Duration:</label>
                <input type="number" class="form-input block w-full mt-1" id="duration" placeholder="duration" wire:model="duration">
                @error('duration') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
              <label for="order" class="block text-gray-700 text-sm font-bold mb-2">Order:</label>
              <input type="number" class="form-input block w-full mt-1" id="order" placeholder="Order" wire:model="order">
              @error('order') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="w-full md:w-1/3 px-3">
              <label for="online" class="block text-gray-700 text-sm font-bold mb-2">Online:</label>
              <input type="checkbox" class="form-checkbox h-6 w-6 text-green-500" id="online" wire:model="online" />
              @error('online') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
          </div>
          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
              <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
              <textarea wire:model="content" id="content" class="form-textarea mt-1 block w-full h-64">
              </textarea>
              @error('content') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
              <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                Save
              </button>
            </span>
            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
              <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                Cancel
              </button>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>
