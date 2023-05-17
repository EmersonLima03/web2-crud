<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  <h1>Hotels</h1><br>
                  @foreach (Auth::user()->myHotels as $hotel)
                  <div class="
                   flex justify-between border-b mb-2 gap-4 hover:bg-gray-300
                  "
                  x-data="{showDelete: false, showEdit: false }">
                      <div class=" flex justify-between flex-grow">
                                            <div>{{ $hotel->nome }}</div>
                                          <div>{{ $hotel->endereco }}</div>
                                          <div>{{ $hotel->num_de_quarto }}</div>
                                          <div>{{ $hotel->classificacao }}</div>
                                          <div>{{ $hotel->cafe_da_manha }}</div>
                      </div>
                      <div class="flex gap-4">
                          <div>
                              <span class="cursor-pointer px-2 bg-red-500 text-white" @click="showDelete = true">Apagar</span>
                          </div>
                          <div>
                              <span class="cursor-pointer px-2 bg-red-500 text-white" @click="showEdit = true">Editar</span>
                          </div>
                      </div>
                  
                      <template x-if="showDelete">
                          <div class="absolute top-0 bottom-0 left-0 right-0 bg-gray-800 bg-opacity-20 z-0">
                              <div class="w-96 bg-white p-4 absolute left-1/4 right-1/4 top-1/4 z-10">
                                  <h2 class="text-x1 font-bold text-center">Tem certeza?</h2>
                                  <div class="flex justify-between mt-4">
                                      <form action="{{ route('hotel.destroy', $hotel) }}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                          <x-danger-button>Delete anyway</x-danger-button>
                                      </form>
                                      <x-primary-button @click="showDelete = false">Cancelar</x-primary-button>
                                  </div>
                              </div>
                          </div>
                      </template>

                      <template x-if="showEdit">
                        <div class="absolute top-0 bottom-0 left-0 right-0 bg-gray-800 bg-opacity-20 z-0">
                            <div class="w-96 bg-white p-4 absolute left-1/4 right-1/4 top-1/4 z-10">
                                <h2 class="text-x1 font-bold text-center">{{ $hotel->nome }}</h2>
                                    <form class="my-4" action="{{ route('hotel.update', $hotel) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                       <x-text-input name="nome" placeholder="Nome" value="{{ $hotel->nome}}" />
                                       <x-text-input name="endereco" placeholder="Endereço" value="{{ $hotel->endereco}}" />
                                        <input type="text" name="num_de_quarto" inputmode="numeric" pattern="[0-9]*" placeholder="Número de Quartos" 
                                        x-model="num_de_quarto" value="{{$hotel->num_de_quarto}}" />
                                    <select name="classificacao" class="rounded-md" x-model="classificacao">
                                        <option value="">Classificação</option>
                                        <option value="5 estrelas">5 estrelas</option>
                                        <option value="4 estrelas">4 estrelas</option>
                                        <option value="3 estrelas">3 estrelas</option>
                                        <option value="2 estrelas">2 estrelas</option>
                                        <option value="1 estrela">1 estrela</option>
                                    </select>
                                    <select name="cafe_da_manha" class="rounded-md" x-model="cafe_da_manha">
                                        <option value="">Café da manhã?</option>
                                        <option value="sim">Sim</option>
                                        <option value="não">Não</option>
                                    </select>
                                       <x-primary-button class="w-full text-center mt-2">Salvar</x-primary-button>
                                    </form>
                                    <x-danger-button @click="showEdit = false" class="w-full">Cancelar</x-danger-button>
                                </div>
                            </div>
                        </div>
                    </template>
                  </div>
                  @endforeach

                  <form action="{{ route('hotel.store') }}" method="POST">
                    @csrf
                     <x-text-input name="nome" placeholder="Nome"  />
                     <x-text-input name="endereco" placeholder="Endereço"  />
                     <input type="text" name="num_de_quarto" inputmode="numeric" pattern="[0-9]*" placeholder="Número de Quartos" />
                        <select name="classificacao" class="rounded-md">
                            <option value="">Classificação</option>
                            <option value="5 estrelas">5 estrelas</option>
                            <option value="4 estrelas">4 estrelas</option>
                            <option value="3 estrelas">3 estrelas</option>
                            <option value="2 estrelas">2 estrelas</option>
                            <option value="1 estrela">1 estrela</option>
                        </select>
                        <select name="cafe_da_manha" class="rounded-md">
                            <option value="">Café da manhã?</option>
                            <option value="sim">Sim</option>
                            <option value="não">Não</option>
                        </select>
                        <x-primary-button>Salvar</x-primary-button>
                    </form>
                    <script>
                        function confirmDelete() {
                            return confirm('Tem certeza de que deseja excluir esta reserva?');
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
