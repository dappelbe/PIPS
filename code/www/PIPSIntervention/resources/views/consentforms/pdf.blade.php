<!doctype html>
<html lang="en-GB">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PIPS Study - Consent Form</title>
    <style>
        page {
            background: white;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
        }
        table {
            width: 100%;
        }
        .left {
            text-align: left;
            float: left;
        }
        .right {
            text-align: right;
            float: right;
        }
        .report-container {
            margin: 0.5cm 1.5cm 1.5cm 1.5cm;
        }
        .footer-info {
            border: 1px black solid;
        }
        .sm-text {
            font-size: x-small;
        }
        .main {
            margin-top: 1cm;
            margin-bottom: 1cm;
        }
        .border {
            border: 1px solid black;
            border-collapse: collapse;
            margin: 0.1cm 0.1cm 0.1cm 0.1cm;
        }
    </style>
</head>
<body>
    <page size="A4">
        <br/>
        <div class="report-container">
            <table>
                <thead class="report-header">
                <tr>
                    <th class="report-header-cell">
                        <div class="header-info">
                            <table>
                                <tr>
                                    <td class="left">
                                        <img src="{{public_path('images/UoOLogo_sm.png')}}" alt="University of Oxford Logo" />
                                    </td>
                                    <td class="right">
                                        <img src="{{public_path('images/pips-logo-100h.png')}}" alt=""/>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="report-content-cell">
                            <div class="main">
                                <div style="text-align: center;">
                                    <div style="font-size: large; font-weight: bold;">
                                        PARTICIPANT CONSENT FORM
                                    </div>
                                    <div style="font-weight: bold; padding-top: 0.5cm;">
                                        Is a participant information portal (a mini website) helpful to participants
                                        that have agreed to take part in a clinical study or trial?
                                    </div>
                                </div>
                                <table class="border">
                                    <tr>
                                        <td class="border">
                                            &#160;
                                        </td>
                                        <td class="border">
                                            &#160;
                                        </td>
                                        <td class="border" style="background: lightgrey">
                                            &#160;&#160;Yes&#160;&#160;
                                        </td>
                                        <td class="border" style="background: lightgrey">
                                            &#160;&#160;No&#160;&#160;
                                        </td>
                                    </tr>
                                    <tr style="vertical-align: top;">
                                        <td class="border">
                                            &#160;&#160;1.&#160;
                                        </td>
                                        <td class="border">
                                            I confirm that I have read the information sheet dated
                                            18Aug2022 (version 1.0) for this study. I have had the opportunity to
                                            consider the information, ask questions and have had these answered
                                            satisfactorily.
                                            <br/>
                                            <br/>
                                        </td>
                                        <td class="border">
                                            @if ( $row['pis'] == 1)
                                                Yes
                                            @endif
                                        </td>
                                        <td class="border">
                                            @if ( $row['pis'] == 0)
                                                No
                                            @endif
                                        </td>
                                    </tr>
                                    <tr style="vertical-align: top;">
                                        <td class="border">
                                            &#160;&#160;2.&#160;
                                        </td>
                                        <td class="border">
                                            I understand that my participation is voluntary and that I am
                                            free to withdraw at any time without giving any reason, without my
                                            medical care or legal rights being affected.
                                            <br/>
                                            <br/>
                                        </td>
                                        <td class="border">
                                            @if ( $row['voluntary'] == 1)
                                                Yes
                                            @endif
                                        </td>
                                        <td class="border">
                                            @if ( $row['voluntary'] == 0)
                                                No
                                            @endif
                                        </td>
                                    </tr>
                                    <tr style="vertical-align: top;">
                                        <td class="border">
                                            &#160;&#160;3.&#160;
                                        </td>
                                        <td class="border">
                                            I understand that data collected during the study may be looked at by
                                            individuals from University of Oxford where it is relevant to my taking
                                            part in this research. I give permission for these individuals to have
                                            access to my records.
                                            <br/>
                                            <br/>
                                        </td>
                                        <td class="border">
                                            @if ( $row['data'] == 1)
                                                Yes
                                            @endif
                                        </td>
                                        <td class="border">
                                            @if ( $row['data'] == 0)
                                                No
                                            @endif
                                        </td>
                                    </tr>
                                    <tr style="vertical-align: top;">
                                        <td class="border">
                                            &#160;&#160;4.&#160;
                                        </td>
                                        <td class="border">
                                            I agree to take part in the PIPS study
                                            <br/>
                                            <br/>
                                        </td>
                                        <td class="border">
                                            @if ( $row['agree'] == 1)
                                                Yes
                                            @endif
                                        </td>
                                        <td class="border">
                                            @if ( $row['agree'] == 0)
                                                No
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                                <div class="main" style="padding-bottom: 1cm;">
                                    <table>
                                        <tr>
                                            <td style="border-bottom: 1px solid black">{{$row['name']}}</td>
                                            <td>&#160;</td>
                                            <td style="border-bottom: 1px solid black">{{$row['consentdate']}}</td>
                                            <td>&#160;</td>
                                            <td style="border-bottom: 1px solid black">
                                                Form submitted electronically
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: small">
                                                Name of Participant
                                            </td>
                                            <td>&#160;</td>
                                            <td style="font-size: small">
                                                Date
                                            </td>
                                            <td>&#160;</td>
                                            <td style="font-size: small">
                                                Signature
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: small">
                                                &#160;
                                            </td>
                                            <td>&#160;</td>
                                            <td style="font-size: small">
                                                &#160;
                                            </td>
                                            <td>&#160;</td>
                                            <td style="font-size: small">
                                                &#160;
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom: 1px solid black">{{$row['takenby']}}</td>
                                            <td>&#160;</td>
                                            <td style="border-bottom: 1px solid black">{{$row['consentdate']}}</td>
                                            <td>&#160;</td>
                                            <td style="border-bottom: 1px solid black">
                                                Form submitted electronically
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: small">
                                                Name of person taking consent
                                            </td>
                                            <td>&#160;</td>
                                            <td style="font-size: small">
                                                Date
                                            </td>
                                            <td>&#160;</td>
                                            <td style="font-size: small">
                                                Signature
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td class="report-footer-cell">
                        <div class="footer-info">
                            <table>
                                <tr>
                                    <td>PIPS</td>
                                    <td style="text-align: right;">Version 1.0 18Aug2022</td>
                                </tr>
                                <tr>
                                    <td>Informed Consent Form &#160; &#160; &#160; &#160; IRAS ID: 3190537</td>
                                    <td style="text-align: right;">Page <strong>1</strong> of <strong>1</strong></td>
                                </tr>
                            </table>
                        </div>
                        <div class="sm-text" style="margin-top: 0.3cm;">
                            CTRG form 306m V3.0 Template Consent form 24 January 2020
                        </div>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>

    </page>
</body>
