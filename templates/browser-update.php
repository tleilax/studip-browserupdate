<table class="browser-update">
	<colgroup>
		<col>
		<col width="128px">
		<col width="128px">
		<col width="128px">
		<col width="128px">
		<col width="128px">
	</colgroup>
	<tr class="info-text">
		<td rowspan="2" class="title right-border">
			<h1>Sie benutzen einen veralteten Browser.</h1>
			<p>
				<b>Der Browser, den Sie benutzen, ist veraltet</b>.
				Er besitzt <i>bekannte Sicherheitsschwachstellen</i>,
				bietet nur <i>begrenzten Komfort</i> und hat viele
				<i>weitere Nachteile</i>.
			</p>
			<p>
				Lesen Sie mehr darüber unter anderem auf
				<a href="http://browser-update.org/update.html">
					browser-update.org
				</a>.
			</p>
		</td>
		<td colspan="5" class="images-title">
			<h2>Hier finden Sie Alternativen oder Möglichkeiten zum Update.</h2>
		</td>
	</tr>
	<tr class="images">
		<td rowspan="2">
			<a href="http://google.com/chrome">
				<img src="<?= $image_dir ?>chrome.png" alt=""><br>
				<span>Chrome</span>
			</a>
		</td>
		<td rowspan="2">
			<a href="http://firefox.com">
				<img src="<?= $image_dir ?>firefox.png" alt=""><br>
				<span>Firefox</span>
			</a>
		</td>
		<td rowspan="2">
			<a href="http://apple.com/safari">
				<img src="<?= $image_dir ?>safari.png" alt=""><br>
				<span>Safari</span>
			</a>
		</td>
		<td rowspan="2">
			<a href="http://opera.com">
				<img src="<?= $image_dir ?>opera.png" alt=""><br>
				<span>Opera</span>
			</a>
		</td>
		<td rowspan="2">
			<a href="http://microsoft.com/ie">
				<img src="<?= $image_dir ?>ie.png" alt=""><br>
				<span>Internet Explorer</span>
			</a>
		</td>
	</tr>
	<tr>
		<td class="options right-border">
			<a href="<?= $plugin_url ?>?return=<?= urlencode($_SERVER['REQUEST_URI']) ?>">
				Diese Information nicht mehr anzeigen.
			</a>
		</td>
	</tr>
</table>