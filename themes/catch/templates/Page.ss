<!DOCTYPE html>
<html lang="$ContentLocale">
<head>
	<% base_tag %>
	<title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	$MetaTags(false)
    <link rel="stylesheet" href="/resources/css/style.css">

	<link rel="shortcut icon" href="themes/simple/images/favicon.ico" />
</head>
<body >
<main class="main" role="main" id="main">
    <h1> Hi Jacob and Richard, please press button</h1>
    <button id="button"> I am Button </button>
    $Form
</main>
<script type="text/javascript" src="/resources/js/script.js"></script>
</body>

</html>
