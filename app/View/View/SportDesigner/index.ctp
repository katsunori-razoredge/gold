<form method='post' action=''>
第二文型<br />
	<select id='2ndForm'>
		<option value="">remain</option>
		<option value="">turn</option>
		<option value="">lie</option>
		<option value="">appear</option>
		<option value="">become</option>
		<option value="">come</option>
		<option value="">get</option>
	</select>
<br />
第四文型<br />
	<select id='4thForm'>
		<option value="">ask</option>
		<option value="">give</option>
		<option value="">buy</option>
		<option value="">provide</option>
		<option value="">tell</option>
		<option value="">pay</option>
		<option value="">sell</option>
		<option value="">send</option>
		<option value="">show</option>
		<option value="">teach</option>
	</select>
<br />
第五文型<br />
	<select id='5thForm'>
		<?php foreach ($fifthVerbs as $key => $value): ?>
			<?php echo '<option value=' . '"' . $key . '">' . $value . '</option>'; ?>
		<?php endforeach; ?>
	</select>
<br />
designer<br />
	<select id='method'>
		<option value="">collision</option>
		<option value="">発展性</option>
		<option value="">(exchange|convert)</option>
		<option value="">onCloseに仕掛け</option>
	</select>
</form>
<br />
helper<br />
	<select id='helper'>
		<option value="">台風</option>
		<option value="">雪</option>
		<option value="">雨</option>
	</select>
<br />
Crovitz<br />
	<select id='crovitz'>
		<option value="">about</option>
		<option value="">across</option>
		<option value="">after</option>
		<option value="">against</option>
		<option value="">among</option>
		<option value="">and</option>
		<option value="">as</option>
		<option value="">at</option>
		<option value="">because</option>
		<option value="">before</option>
		<option value="">between</option>
		<option value="">but</option>
		<option value="">by</option>
		<option value="">down</option>
		<option value="">for</option>
		<option value="">from</option>
		<option value="">if</option>
		<option value="">in</option>
		<option value="">near</option>
		<option value="">not</option>
		<option value="">now</option>
		<option value="">of</option>
		<option value="">off</option>
		<option value="">on</option>
		<option value="">opposite</option>
		<option value="">or</option>
		<option value="">out</option>
		<option value="">over</option>
		<option value="">round</option>
		<option value="">so</option>
		<option value="">still</option>
		<option value="">then</option>
		<option value="">though</option>
		<option value="">through</option>
		<option value="">till</option>
		<option value="">to</option>
		<option value="">under</option>
		<option value="">up</option>
		<option value="">when</option>
		<option value="">where</option>
		<option value="">while</option>
		<option value="">with</option>
		<option value="">above</option>
		<option value="">below</option>
		<option value="">except</option>
		<option value="">toward</option>
		<option value="">along</option>
		<option value="">beneath</option>
		<option value="">into</option>
		<option value="">upon</option>
		<option value="">amid</option>
		<option value="">beside</option>
		<option value="">past</option>
		<option value="">within</option>
		<option value="">around</option>
		<option value="">beyond</option>
		<option value="">since</option>
		<option value="">without</option>
		<option value="">behind</option>
		<option value="">during</option>
		<option value="">throughout</option>
	</select>
<br />
<a href="https://razor-edge.net/study/do/adverb.jpg">adverbリスト</a>
