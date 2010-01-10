<?php
/**
 * TL_ROOT/system/modules/efg/languages/de/tl_form.php
 *
 * TYPOlight extension: efg 1.10.3 stable
 * Deutsch translation file
 *
 * Copyright : (c) 2008 Thomas Kuhn
 * License   : GNU LGPL V3
 * Author    : Thomas Kuhn (tom)
 * Translator: Thomas Kuhn (tom)
 *
 * This file was created automatically be the TYPOlight extension repository translation module.
 * Do not edit this file manually. Contact the author or translator for this module to establish
 * permanent text corrections which are update-safe.
 */

$GLOBALS['TL_LANG']['tl_form']['storeFormdata']['0'] = "Daten im Modul \"Formular-Daten\" speichern";
$GLOBALS['TL_LANG']['tl_form']['storeFormdata']['1'] = "Wenn Sie diese Option wählen, werden die Daten im Backend-Modul \"Formular-Daten\" gespeichert.<br>Hinweis: Nach Ergänzung oder Änderung von Formular-Feldern bitte das Formular erneut speichern.";
$GLOBALS['TL_LANG']['tl_form']['efgAliasField']['0'] = "Formularfeld für Alias";
$GLOBALS['TL_LANG']['tl_form']['efgAliasField']['1'] = "Wählen Sie hier das Formularfeld, dessen Inhalt zur Erzeugung des Formulardaten-Alias verwendet wird.";
$GLOBALS['TL_LANG']['tl_form']['efgStoreValues']['0'] = "Options-Werte speichern";
$GLOBALS['TL_LANG']['tl_form']['efgStoreValues']['1'] = "Wenn Sie diese Option wählen, wird bei Radio-Buttons, Checkboxen und Selects der ausgewählte \"Wert\" anstelle der \"Bezeichnung\" gespeichert";
$GLOBALS['TL_LANG']['tl_form']['useFormValues']['0'] = "Feldwerte exportieren";
$GLOBALS['TL_LANG']['tl_form']['useFormValues']['1'] = "Wenn Sie diese Option wählen, werden beim Export der Formulardaten die ausgewählten Werte von Formularfeldern anstelle der ausgewählten Bezeichnungen exportiert. Dies trifft für alle Radio-Buttons, Checkboxen und Selects zu.";
$GLOBALS['TL_LANG']['tl_form']['useFieldNames']['0'] = "Feldnamen exportieren";
$GLOBALS['TL_LANG']['tl_form']['useFieldNames']['1'] = "Wenn Sie diese Option wählen, werden beim Export der Formulardaten die Feldnamen anstelle der Feldbezeichnungen exportiert.";
$GLOBALS['TL_LANG']['tl_form']['sendConfirmationMail']['0'] = "Bestätigung per E-Mail versenden";
$GLOBALS['TL_LANG']['tl_form']['sendConfirmationMail']['1'] = "Wenn Sie diese Option wählen, wird eine Bestätigung per E-Mail an den Absender des Formulars versendet.";
$GLOBALS['TL_LANG']['tl_form']['confirmationMailRecipientField']['0'] = "Formularfeld mit E-Mail-Adresse des Empfängers";
$GLOBALS['TL_LANG']['tl_form']['confirmationMailRecipientField']['1'] = "Wählen Sie hier das Formularfeld, in dem der Absender seine E-Mail-Adresse angibt oder ein Formularfeld, das die Empfänger-Adresse als Wert enthält.";
$GLOBALS['TL_LANG']['tl_form']['confirmationMailRecipient']['0'] = "Empfänger";
$GLOBALS['TL_LANG']['tl_form']['confirmationMailRecipient']['1'] = "Kommagetrennte Liste von E-Mail-Adressen, falls die E-Mail-Adresse nicht per Formularfeld definiert wird, oder die E-Mail an weitere Empfänger gesendet werden soll.";
$GLOBALS['TL_LANG']['tl_form']['confirmationMailSender']['0'] = "Absender";
$GLOBALS['TL_LANG']['tl_form']['confirmationMailSender']['1'] = "Bitte geben Sie hier die Absender-E-Mail-Adresse ein.";
$GLOBALS['TL_LANG']['tl_form']['confirmationMailSubject']['0'] = "Betreff";
$GLOBALS['TL_LANG']['tl_form']['confirmationMailSubject']['1'] = "Bitte geben Sie eine Betreffzeile für die Bestätigungs-E-Mail ein. Wenn Sie keine Betreffzeile erfassen, steigt die Wahrscheinlichkeit, dass die E-Mail als SPAM identifiziert wird.";
$GLOBALS['TL_LANG']['tl_form']['confirmationMailText']['0'] = "Text der Bestätigungs-E-Mail";
$GLOBALS['TL_LANG']['tl_form']['confirmationMailText']['1'] = "Bitte geben Sie hier den Text der Bestätigungs-E-Mail ein. Neben den allgemeinen Insert-Tags werden Tags der Form form::FORMULARFELDNAME unterstützt.";
$GLOBALS['TL_LANG']['tl_form']['confirmationMailTemplate']['0'] = "HTML-Vorlage für die Bestätigungs-E-Mail";
$GLOBALS['TL_LANG']['tl_form']['confirmationMailTemplate']['1'] = "Wenn die Bestätigungs-E-Mail als HTML-E-Mail versendet werden soll, wählen Sie hier die HTML-Vorlage aus dem Dateisystem.";
$GLOBALS['TL_LANG']['tl_form']['sendFormattedMail']['0'] = "Per E-Mail versenden (formatierter Text / HTML)";
$GLOBALS['TL_LANG']['tl_form']['sendFormattedMail']['1'] = "Der Inhalt der Nachricht kann frei angegeben werden, unter Verwendung von Insert-Tags. Die Nachricht kann auch als HTML-E-Mail versendet werden.";
$GLOBALS['TL_LANG']['tl_form']['formattedMailText']['0'] = "Text der E-Mail";
$GLOBALS['TL_LANG']['tl_form']['formattedMailText']['1'] = "Bitte geben Sie hier den Text der E-Mail ein. Neben den allgemeinen Insert-Tags werden Tags der Form form::FORMULARFELDNAME unterstützt.";
$GLOBALS['TL_LANG']['tl_form']['formattedMailText']['0'] = "Text der E-Mail";
$GLOBALS['TL_LANG']['tl_form']['formattedMailText']['1'] = "Bitte geben Sie hier den Text der E-Mail ein. Neben den allgemeinen Insert-Tags werden Tags der Form form::FORMULARFELDNAME unterstützt.";
$GLOBALS['TL_LANG']['tl_form']['formattedMailTemplate']['0'] = "HTML-Vorlage für die E-Mail";
$GLOBALS['TL_LANG']['tl_form']['formattedMailTemplate']['1'] = "Wenn die E-Mail als HTML-E-Mail versendet werden soll, wählen Sie hier die HTML-Vorlage aus dem Dateisystem.";

$GLOBALS['TL_LANG']['tl_form']['efgStoreFormdata_legend'] = '(EFG) Formular-Daten speichern';
$GLOBALS['TL_LANG']['tl_form']['efgSendFormattedMail_legend'] = '(EFG) Per E-Mail versenden';
$GLOBALS['TL_LANG']['tl_form']['efgSendConfirmationMail_legend'] = '(EFG) Bestätigung per E-Mail versenden';
?>
