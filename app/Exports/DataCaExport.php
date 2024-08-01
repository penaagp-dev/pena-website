<?php

namespace App\Exports;

use App\Models\RegisterCaModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataCaExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $dataCa = RegisterCaModel::select(
            'name',
            'date_of_birth',
            'religion',
            'email',
            'phone',
            'major',
            'semester',
            'gender',
            'address',
            'reason_register'
        )->where('status', 'approved')->get();

        $dataCa = $dataCa->map(function ($item, $key) {
            $item->gender = $item->gender == 'male' ? 'Laki-laki' : ($item->gender == 'female' ? 'Perempuan' : $item->gender);  
            return array_merge(['id' => $key + 1], $item->toArray());
        });

        return $dataCa;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Tanggal Lahir',
            'Agama',
            'Email',
            'Phone',
            'Jurusan',
            'Semester',
            'Jenis Kelamin',
            'Address',
            'Alasan bergabung'
        ];
    }
}
