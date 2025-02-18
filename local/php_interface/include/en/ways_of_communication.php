<p>Single reference service:<br>
    <a class="link link-underline" href="tel:<?= preg_replace("/[\s-]/", "", UF_PHONE2) ?>">
        <?= COption::GetOptionString("novikom.settings", "UF_PHONE2"); ?>
    </a>
</p>
<p>For calls from abroad:<br>
    <a class="link link-underline" href="tel:<?= preg_replace("/[\s-]/", "", UF_PHONE1) ?>">
        <?= UF_PHONE1 ?>
    </a>
</p>
<button class="link link-underline" data-bs-toggle="modal"
        data-bs-target="#modal-callback-form">Request a call
</button>
<br>
<button class="link link-underline" data-bs-toggle="modal"
        data-bs-target="#modal-feedback-form">Ask a Question
</button>
<br>
<a class="link link-underline" href="/customer-requests/">
    Procedure for contacting the bank
</a>
