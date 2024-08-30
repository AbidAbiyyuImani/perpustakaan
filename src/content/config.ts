import { z, defineCollection } from 'astro:content';

const buku = defineCollection({
    type: 'data',
    schema: z.object({
        BukuId: z.number(),
        Judul: z.string(),
        Penulis: z.string(),
        Penerbit: z.string(),
        TahunTerbit: z.number(),
        NamaKategori: z.enum([
            "Kategori A",
            "Kategori B",
            "Kategori C",
            "Kategori D",
            "Kategori E",
        ]),
    })
});

export const collection = {
    'buku': buku
};