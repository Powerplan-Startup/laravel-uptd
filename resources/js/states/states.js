import auth from "./models/auth"
import instruktur from "./models/instruktur"
import jadwal from "./models/jadwal"
import jenis_kelamin from "./models/jenis_kelamin"
import kejuruan from "./models/kejuruan"
import notifikasi from "./models/notifikasi"
import peserta from "./models/peserta"
import berita from "./models/berita"
import app from "./models/app"
import pimpinan from "./models/pimpinan"
import paket from "../routes/pages/paket"

export const states = {
	kejuruan,
	notifikasi,
	instruktur,
	jenis_kelamin,
	jadwal,
	peserta,
	auth,
	app,
	berita,
	pimpinan,
	paket,
}
export default states