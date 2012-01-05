/**
 *	Please note:
 *  ------------
 *	Due to local changes, the injected bar might not look accurate.
 *	You have to adjust the css in part #1 to your local changes.
 **/

/* #1 - patch stud.ip's css so that the logo won't interfere */
#header {
	position: relative;
}
#barTopStudip {
	top: 173px !important;
}

/* #2 - design of the "browser update" bar */
.browser-update {
	background: #fec;
	border-bottom: 5px double #862;
	border-collapse: collapse;
	height: 128px;
	text-align: center;
	width: 100%;
}

.browser-update td, .browser-update p {
	color: #862;
}
.browser-update h1, .browser-update h2 {
	margin: 0;
	padding: 0;
	text-align: center;
}

.browser-update .right-border {
	border-right: 1px dotted #862;
}

.browser-update .info-text td {
	text-align: justify;
	vertical-align: top;
}
.browser-update p {
	margin: 0;
	padding: 2px 3em;
	text-align: justify;
}

.browser-update .options {
	text-align: right;
	padding: 5px;
}
.browser-update .options a {
	background: url(<?= Assets::image_path('messagebox/cross_inv.png') ?>) right center no-repeat;
	padding-right: 20px;
}

.browser-update .images a span {
	color: #000;
	font-weight: bold;
	visibility: hidden;
}
.browser-update .images a:hover span {
	visibility: visible;
}
