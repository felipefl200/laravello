<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\Card;
use App\Models\CardList;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        $board1 = Board::create([
            'title' => 'Compras', 'color' => 'teal', 'owner_id' => 1
        ]);
        $board2 = Board::create([
            'title' => 'Trabalho', 'color' => 'orange', 'owner_id' => 2
        ]);
        $board3 = Board::create([
            'title' => 'Lazer', 'color' => 'indigo', 'owner_id' => 1
        ]);

        collect([$board1, $board2, $board3])->each(function (Board $board) {
            $list1 = CardList::create([
                'title' => 'À Fazer', 'board_id' => $board->id
            ]);
            $list2 = CardList::create([
                'title' => 'Em andamento', 'board_id' => $board->id
            ]);
            $list3 = CardList::create([
                'title' => 'Concluído', 'board_id' => $board->id
            ]);

            collect([$list1, $list2, $list3])->each(function (CardList $list) use ($board) {
                $order = 1;

                collect([
                    'Comprar doces',
                    'Levar a Bel para passear',
                    'Jogar PUBG',
                    'Ir no Dentista',
                    'Escrever alguns codigos',
                    'Fazer orçamento - Lisboa',
                    'Organizar arquivos',
                    'Atender Caprice'
                ])->random(random_int(2, 5))->each(function (string $task) use ($board, $list, &$order) {
                    $list->cards()->save(
                        Card::make(['title' => $task, 'owner_id' => $board->owner_id, 'order' => $order++])
                    );
                });
            });
        });
    }
}
