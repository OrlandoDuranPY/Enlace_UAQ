  <button class="bg-rojo py-1 px-3 rounded-lg font-semibold text-white focus:ring-2 focus:ring-offset-2 focus:ring-rojo" type="button" data-modal-target="defaultModal" data-modal-toggle="defaultModal">Nuevo</button>

  <!-- Main modal -->
  <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow ">
              <!-- Modal header -->
              <div class="flex items-start justify-between p-4 border-b rounded-t bg-rojo text-white">
                  <h3 class="text-2xl font-semibold">
                      {{$modalName}}
                  </h3>
                  <button type="button" class="text-white bg-transparent hover:bg-white hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                  </button>
              </div>
              <!-- Modal body -->
              {{$modalBody}}

          </div>
      </div>
  </div>
