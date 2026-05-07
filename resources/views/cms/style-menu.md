
Instruksi gaya (styling) untuk membuat tampilan CRUD konsisten
===============================================================

Tujuan: Berikan panduan styling yang dipakai saat membuat halaman CRUD agar konsistensi tampilan terjaga di seluruh proyek. Fokus hanya pada gaya (layout, spacing, warna, ikon, komponen visual) — bukan pada struktur data atau validasi input.

Prinsip umum
- Gunakan palette warna utama dan aksen proyek: primary = `#0164CA`, accent = `#F7D558`.
- Hindari bayangan dan gradien; gunakan border dan solid color untuk kedalaman.
- Konsistenkan radius, spacing, dan ukuran font antar komponen.

Komponen Utama

1) Kontainer / Card
- Kelas dasar: gunakan `bg-white rounded-2xl border border-gray-100 overflow-hidden`.
- Header card: area header bisa pakai `p-5 border-b border-gray-100`.
- Jika header butuh warna: gunakan `bg-primary-500 p-6 text-white` hanya untuk header khusus.

2) Grid layout halaman CRUD
- Struktur layout: main (konten) + sidebar (pengaturan/aksi).
- Grid dasar: `<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">` dengan `lg:col-span-2` untuk konten.

3) Judul dan header section
- Judul: `text-2xl font-bold text-gray-900`.
- Subjudul/description: `text-sm text-gray-500`.

4) Form fields (styling saja)
- Field wrapper: gunakan card atau block dengan `bg-white rounded-2xl border border-gray-100 p-4`.
- Label: `block text-sm font-medium text-gray-700 mb-2`.
- Input teks: `w-full px-4 py-3 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition-all duration-200`.
- Textarea: sama gaya tetapi tambahkan `resize-none` dan `rows` yang sesuai.
- Select: seperti input, gunakan `bg-white` dan hindari shadow.
- File input: gunakan `border-2 border-dashed border-gray-200 rounded-xl file:...` pattern konsisten (lihat file upload pattern proyek).

5) Buttons
- Primary: `px-4 py-2.5 bg-primary-500 text-white rounded-xl font-medium hover:bg-primary-600 transition-all duration-200`.
- Secondary/outline: `px-4 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-200`.
- Small action buttons (table): `inline-flex items-center gap-1 px-2 py-1 text-xs rounded-lg` dengan warna latar sesuai action (primary/amber/red).

6) Icon usage
- Gunakan Lucide icon set via attribute `data-lucide="icon-name"`.
- Ikon container (colored): `w-8 h-8 bg-primary-50 rounded-lg flex items-center justify-center` lalu ikon `w-4 h-4 text-primary-600`.

7) Badges & Status
- Badges ringkas: `inline-flex items-center gap-1 px-2 py-1 text-xs font-medium rounded-full`.
- Warna status contoh: draft=gray, pending=amber, approved=emerald, rejected=red, published=primary (gunakan bg-*-100 + text-*-700 variant).

8) Toggle / Switch
- Gunakan input checkbox with peer pattern from project:
	- wrapper: `relative inline-flex items-center cursor-pointer`
	- track: `w-11 h-6 bg-gray-200 rounded-full peer-checked:bg-primary-500` and `after` handle classes as project uses.

9) Table vs Mobile Cards
- Desktop: `hidden md:block` with `<table class="w-full">`.
- Mobile: `md:hidden` and use card list with `grid grid-cols-2` for metadata, consistent spacing and `p-2.5 sm:p-3` paddings.

10) Responsive typography
- Minimum readable sizes: labels `text-xs` (≥12px), body `text-sm` (≥14px).
- Headings scale: base `text-base` → md `text-lg` → lg `text-xl`.

11) Form action area (sidebar actions)
- Action card: `bg-white rounded-2xl border border-gray-100 p-5`.
- Primary save button full width: `w-full px-4 py-3 bg-primary-500 text-white rounded-xl`.

12) Error & helper text
- Error text: `mt-1.5 text-sm text-red-600 flex items-center gap-1` with icon `alert-circle`.
- Helper text: `mt-1.5 text-xs text-gray-500 flex items-start gap-1`.

13) Accessibility
- Always include `<label for="...">` for inputs and proper `aria-` attributes for toggles and dynamic dropdowns.

14) Dropdown groups in sidebar
- Use button that toggles a `.dropdown-content` container.
- Button pattern: `w-full flex items-center justify-between gap-3 px-4 py-3 rounded-xl text-sm font-medium text-white/80 hover:bg-white/10` (adjust colors for theme).

15) Small design rules (project conventions)
- NO SHADOWS and NO GRADIENTS.
- Use rounded corners `rounded-xl` / `rounded-2xl` consistently.
- Use `border` to separate sections, not heavy elevation.

How to use this instruction (prompt template)
-------------------------------------------------
When you build a new CRUD page, follow these steps:
1. Use the grid layout: main + sidebar as described in section 2.
2. Wrap form fields in cards and apply the input classes in section 4.
3. Use the button classes in section 5 for actions.
4. Apply responsive rules from section 9 and typography from section 10.
5. Use Lucide icons (section 6) and badge styles (section 7) where needed.

Notes
- Fokuskan perubahan pada kelas CSS dan struktur HTML — jangan mengubah logika backend atau shape data.
- Jika sebuah form butuh field berbeda, tetap gunakan pola visual yang sama (cards, spacing, buttons, labels).

Simpan file ini sebagai referensi ketika membuat tampilan CRUD baru agar semua halaman memiliki bahasa visual yang sama.
