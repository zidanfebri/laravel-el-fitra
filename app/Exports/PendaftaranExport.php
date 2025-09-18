<?php

  namespace App\Exports;

  use Maatwebsite\Excel\Concerns\FromCollection;
  use Maatwebsite\Excel\Concerns\WithHeadings;

  class PendaftaranExport implements FromCollection, WithHeadings
  {
      protected $data;

      public function __construct($data)
      {
          $this->data = $data;
      }

      public function collection()
      {
          return $this->data->map(function ($pendaftaran) {
              return [
                  'Jenis Pendaftaran' => $pendaftaran->jenis_pendaftaran,
                  'Jenjang' => $pendaftaran->jenjang,
                  'Tingkat' => $pendaftaran->tingkat,
                  'Nama Siswa' => $pendaftaran->nama_siswa,
                  'Tanggal Pendaftaran' => $pendaftaran->tanggal_pendaftaran,
              ];
          });
      }

      public function headings(): array
      {
          return [
              'Jenis Pendaftaran',
              'Jenjang',
              'Tingkat',
              'Nama Siswa',
              'Tanggal Pendaftaran',
          ];
      }
  }