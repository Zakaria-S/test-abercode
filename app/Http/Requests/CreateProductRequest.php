<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|max:255',
            'kode' => 'required|size:16|unique:products,kode',
            'harga' => 'required|integer',
            'tanggal_produksi' => 'required|date|before:tomorrow'
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama Produk harus diisi',
            'nama.max' => 'Nama Produk tidak boleh lebih dari 255 karakter',
            'kode.required' => 'Kode Produk harus diisi',
            'kode.size' => 'Kode Produk harus memiliki 16 karakter',
            'kode.unique' => 'Kode Produk ini sudah digunakan',
            'harga.required' => 'Harga Produk harus diisi',
            'harga.integer' => 'Harga Produk harus berupa angka',
            'tanggal_produksi.required' => 'Tanggal Produksi harus diisi',
            'tanggal_produksi.before' => 'Tanggal Produksi tidak bisa diisi dengan tanggal setelah hari ini'
        ];
    }
}
