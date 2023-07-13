<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>№24 коммерческий</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head> -->
@extends('forthebuilder::layouts.forthebuilder')
<?php

$months = [
    '01' => 'Января',
    '02' => 'Февраля',
    '03' => 'Марта',
    '04' => 'Апреля',
    '05' => 'Мая',
    '06' => 'Июня',
    '07' => 'Июля',
    '08' => 'Августа',
    '09' => 'Сентября',
    '10' => 'Октября',
    '11' => 'Ноября',
    '12' => 'Декабря',
];

?>
<div style="border: 2px solid black;" id="DivIdToPrint">
    <div style="display: flex; flex-direction: column; align-items: center;">
        <h3>ПРЕДВАРИТЕЛЬНЫЙ ДОГОВОР</h3>
        <h3 style="margin-top: -10px;">купли-продажи нежилого помещения № {{ $data['house_flat_number'] }}</h3>
    </div>

    <div style="margin: 0px 50px;">
        <p style="font-size: 14px;"><span style="margin-left: 30px;">Настоящий</span> предварительный договор
            купли-продажи нежилого помещения («Договор») заключен «{{ date('d') }}» {{ $months[date('m')] }}
            {{ date('Y') }} г. в городе Ош, Кыргызская Республика, между:</p>
        <div style="font-size: 14px;"><b>1. Обществом с ограниченной ответственностью «Бизнес Хаус КГ»,</b> в лице
            генерального директора <b>Таджибаева Музаффара Мурадиловича,</b> действующего на основании Устава и Приказа
            №1, здесь и далее именуемый <b>«Продавец»</b>, с одной стороны,</div>
        <br>
        <div style="font-size: 14px;"><b>2. Гражданином (ой) Кыргызкой Республики {{ $data['last_name'] }}
                {{ $data['first_name'] }} {{ $data['middle_name'] }},
                {{ date('d.m.Y', strtotime($data['birth_date'])) }}</b> года рождения, паспорт серии
            <b>{{ $data['series_number'] }}</b> от <b>{{ $data['given_date'] }}, выдан {{ $data['issued_by'] }}, ИНН
                {{ $data['inn'] }}</b> проживающий по адресу: Кыргызская Республика: {{ $data['live_address'] }}
            здесь и далее именуемый<span style="color: red">(ой)</span> <b>«Покупатель»</b>, с другой стороны, а вместе
            здесь и далее именуемые <b>«Стороны»</b>, </div>
        <br>
        <br>
        <h4>ПОСКОЛЬКУ:</h4>
        <p style="font-size: 16px">1) Продавец имеет намерение продать Покупателю, а Покупатель имеет намерение купить у
            Продавца нежилое помещение в многоквартирном жилом комплексе «{{ $houseFlatItem->house->name }}»,
            расположенный по адресу: Кыргызская Республика, ____________________________________________________________
            (далее – «объект»), после сдачи объекта в эксплуатацию по завершении строительства. 2) Стороны могут
            заключить основной договор купли-продажи нежилого помещения только после завершения строительства объекта и
            сдачи его в эксплуатацию, на основании вышеизложенного, с целью закрепления своих намерений, Стороны пришли
            к решению заключить предварительный договор купли-продажи нежилого помещения о нижеследующем:</p>
        <i>
            <p style="font-size: 16px"><span style="margin-left: 5%;">Настоящим</span> Покупатель подтверждает, что
                перед заключением настоящего Договора, текст Договора им полностью прочитан, язык на котором составлен
                Договор, как и иные условия Договора понятны полностью, а также ему понятны права и обязанности по
                Договору. Подписанием настоящего Договора, а также иных необходимых документов, связанных с исполнением
                Договора, Стороны подтверждают, что не находятся в состоянии алкогольного, наркотического и/или иного
                опьянения, а находятся в состоянии вменяемости, трезво и разумно осознают суть всех условий Договора и
                значение заключаемой друг с другом сделки. Стороны гарантируют, что обладают необходимой
                правосубъективностью и правоспособностью и иными необходимыми полномочиями для заключения настоящего
                Договора, а также не состоят под опекой и попечительством, не страдают заболеваниями, препятствующими
                осознать суть Договора, а также отсутствуют обстоятельства, вынуждающие заключать Договор на крайне
                невыгодных для себя условиях.</p>
            <p style="font-size: 16px"><span style="margin-left: 5%;">Вместе</span> с тем, Стороны подтверждают, что
                содержание и смысл условий, отраженных в Договоре, соответствует их действительному волеизъявлению и
                намерениям.</p>
        </i>
        <p style="font-size: 16px"><span style="margin-left: 5%;">Стороны</span>, определили термины и определения,
            используемые в Договоре:</p>
        <p style="font-size: 16px"><b>Продавец</b> – юридическое лицо/застройщик (ОсОО «Бизнес Хаус КГ»), которое
            осуществляет продажу строящихся/построенных объектов недвижимости (квартир/нежилых помещений) в пользу
            Покупателей за определённое Договором вознаграждение.</p>
        <p style="font-size: 14px;"><b>Покупатель</b> – физическое/юридическое лицо, имеющее намерение приобрести в
            собственность нежилое помещение у Продавца на возмездной основе и на условиях, предусмотренных Договором для
            удовлетворения потребительских, личных нужд.</p>
        <p style="font-size: 14px;"><b>Государственное учреждение «Кадастр» (Ошский филиал Государственного учреждения
                «Кадастр»)</b> – уполномоченный государственный орган, осуществляющий регистрацию прав на недвижимое
            имущество в установленном законодательством порядке.</p>
        <p style="font-size: 16px"><b>Основной договор</b> - это договор купли-продажи нежилого помещения, оформляемый и
            регистрируемый в Государственном учреждении «Кадастр», по которому одна сторона (продавец) обязуется
            передать имущество другой стороне (покупателю), получив за него определенную денежную сумму согласно
            условиям Договора.</p>
        <br>
        <h4 style="text-align: center"> 1.ПРЕДМЕТ ДОГОВОРА</h4>
        <br>
        <p style="font-size: 14px;">1.1. Продавец обязуется продать, а Покупатель приобрести в собственность недвижимое
            имущество, парковочное место: <b>№{{ $houseFlatItem->number_of_flat }},
                {{ $houseFlatItem->floor }}-этаж</b>, в многоквартирном жилом комплексе «{{ $houseFlatItem->house->name }}»,
            строящемся по адресу: Ошская обл. Кара-Суйский район. село Кызыл-Кыштак ул. Курманжан Датка дом№584 (далее –
            «парковочное место»).</p>
        <p style="font-size: 14px;">1.2. Настоящий договор является предварительным. Стороны обязуются заключить
            основной договор купли-продажи нежилого помещения в течение 60 (шестидесяти) календарных дней после сдачи в
            эксплуатацию многоквартирного жилого дома и регистрации права собственности Продавца на нежилое помещение
            или в иной срок готовности оформления нежилого помещения, о чем Покупатель будет предварительно уведомлен
            Продавцом в порядке, предусмотренном Договором, в государственном органе, осуществляющем регистрацию прав на
            недвижимое имущество (далее – «ГУ Кадастр») в установленном законодательством порядке. </p>
        <p style="font-size: 14px;">1.3. После замера ГУ “Кадастр” указанная в Предварительном Договоре купли-продажи
            общая продаваемая площадь нежилого помещения может иметь допустимую погрешность по количеству квадратных
            метров в сторону увеличения или уменьшения не более чем на 2 (два) кв. м., что не является ненадлежащим
            исполнением Продавцом обязательств по настоящему Договору. </p>
        <p style="font-size: 14px;">1.4. Покупатель приобретает право собственности на недвижимое имущество после
            подписания между Сторонами в установленные настоящим Договором сроки основного договора купли-продажи,
            который подлежит регистрации в ГУ “Кадастр”.</p>
        <br>
        <h4 style="text-align: center;">СУЩЕСТВЕННЫЕ УСЛОВИЯ И ПОРЯДОК ЗАКЛЮЧЕНИЯ <br> ОСНОВНОГО И ПРЕДВАРИТЕЛЬНОГО
            ДОГОВОРА КУПЛИ ПРОДАЖИ <br> ПАРКОВОЧНОГО МЕСТА
        </h4>
        <br>
        <p style="font-size: 14px;">2.1. Стороны определили следующие существенные условия основного договора
            купли-продажи парковочного места:</p>
        <p style="font-size: 14px;">2.1.1. Предмет договора – парковочное место <b>№{{ $houseFlatItem->number_of_flat }}</b> в {{ $houseFlatItem->floor }}- этаже многоквартирного
            жилого комплекса «{{ $houseFlatItem->house->name }}», расположенный по адресу: Кыргызская Республика, {{ $data['live_address'] }} “Кадастр”.</p>
        <p style="font-size: 14px;">2.1.2. Реализуемая стоимость парковочного места определена Сторонами в сумме, с
            учетом налогов, из расчета <b>{{ ($data['valuta'] == 0) ? $data['price_sell'] : $data['valuta'] * $currencySum }} (____________) {{ ($data['valuta'] == 0) ? 'США долларов' : 'сомах' }}</b>, приобретаемого парковочного места по
            Договору. Указанная стоимость квадратного метра не подлежит изменению сторонами в одностороннем порядке.</p>
        <p style="font-size: 14px;">2.1.3. Покупатель производит оплату стоимости парковочного места в {{ ($data['valuta'] == 0) ? 'долларах США' : 'сомах' }}  или
            в национальной валюте по курсу «НБКР» (Национальный банк Кыргызской Республики) на день осуществления
            платежа, в день составления предварительного договора. /p>
        <p style="font-size: 14px;">2.1.4. Все расходы по заключению основного и/или предварительного договора
            купли-продажи парковочного места и его регистрации в ГУ “Кадастр” оплачивает Покупатель в полном объеме.
        </p>
        <br>
        <h4 style="text-align: center">3.ПРАВА И ОБЯЗАННОСТИ СТОРОН</h4>
        <br>
        <p style="font-size: 14px;"><b>3.1. Продавец по настоящему Договору обязуется:</b></p>
        <p style="font-size: 14px;">3.1.1. Передать Покупателю нежилое помещение, оборудованную согласно Приложению № 2,
            по акту приема-передачи нежилого помещения в течение 20 (двадцати) месяцев с момента получения разрешения на
            строительство. При этом Стороны согласились, что с момента подписания акта приема передачи, указанного в
            настоящем пункте, все риски гибели/порчи нежилого помещения – переходят к Покупателю.</p>
        <p style="font-size: 14px;">3.1.2. Заключить с Покупателем основной договор купли-продажи нежилого помещения в
            порядке и сроки, установленные п. 1.2. настоящего Договора. </p>
        <p style="font-size: 14px;">3.1.3. В случае расторжения настоящего Договора в одностороннем порядке не по вине
            Продавца, в том числе по причине ненадлежащего исполнения Покупателем обязательств по настоящему Договору,
            или если одностороннее расторжение Договора произведено Покупателем при отсутствии оснований,
            предусмотренных настоящим Договором, осуществление возврата оплаченных Покупателем денежных средств
            Покупателю производится только после реализации Продавцом указанного нежилого помещения третьим лицам.</p>
        <p style="font-size: 14px;"><b>3.2. Продавец по настоящему Договору имеет право:</b></p>
        <p style="font-size: 14px;">3.2.1. Требовать от Покупателя, надлежащего исполнения обязательств по настоящему
            Договору. </p>
        <p style="font-size: 14px;">3.2.2. В случае задержки, передачи нежилого помещения согласно п.п. 3.1.1. Договора
            Продавец имеет право на отсрочку равную 60 (шестьдесят) рабочих дней без уплаты пени Покупателю, о чем
            последний уведомлен при подписании настоящего Договора и с чем согласен. </p>
        <p style="font-size: 14px;">3.2.3. Требовать от Покупателя компенсацию, если общая продаваемая площадь нежилого
            помещения превышает допустимую норму отклонения от площади нежилого помещения, установленную пунктом 1.3.
            настоящего Договора, и составляет более – 2 (двух) кв.м., исходя из цены за 1 кв.м. указанной п. 2.1.2.
            настоящего Договора. </p>
        <p style="font-size: 14px;">3.2.4. Закончить строительство объекта досрочно. В этом случае Покупатель обязуется
            оплатить полную стоимость нежилого помещения, независимо от срока рассрочки оплаты, определенной в
            Приложении № 1, а Продавец вправе потребовать от Покупателя полной оплаты стоимости Нежилого помещения также
            досрочно. При невозможности и несостоятельности оплаты досрочно Покупателем, Продавец разрешает произвести
            оплату согласно графику платежей (Приложение № 1), с условием того, что в случае, если Покупатель не сможет
            выплатить стоимость Нежилого помещения по завершению графика, Продавец вправе отказаться от исполнения
            настоящего Договора, а Покупатель обязан незамедлительно освободить Нежилое помещение во внесудебном
            порядке. При этом Нежилое помещение остается в собственности Продавца без возмещения внесенных неотделимых
            улучшений Покупателю согласно условиям настоящего Договора, и Продавец вправе реализовать ее третьим лицам
            по своему усмотрению, с наступлением последствий, предусмотренных пунктом 3.1.3. настоящего Договора.</p>
        <p style="font-size: 14px;">3.2.5. Продавец имеет право устанавливать и изменять в любую сторону стоимость
            аналогичного нежилого помещения, которые не являются предметом взаимоотношений Продавца и Покупателя по
            настоящему Договору, и реализовывать их по иной стоимости, вне зависимости от стоимости (цен) , по которой
            заключен настоящий Договор, а также не связан условиями договоров, заключенных с другими Покупателями на
            аналогичных нежилых помещений ранее при определении условий настоящего Договора в отношении цены.</p>
        <p style="font-size: 14px;">3.2.6. Не передавать нежилое помещение по акту приема передачи Покупателю, до
            полного погашения задолженности по оплате, в соответствии с условиями настоящего Договора.</p>
        <p style="font-size: 14px;">3.2.7. Стороны договорились, что Продавец вправе в одностороннем порядке уступить
            Финансовому агенту (Банку или иной финансово-кредитной организации) право денежного требования к Покупателю
            без предварительного уведомления Покупателя, на основании заключенного между Продавцом и финансовым агентом
            соответствующего соглашения. При этом Продавец обязуется уведомить Покупателя о состоявшейся уступке Банку
            или иной финансово-кредитной организации своего права денежного требования в течение 5 (пяти) рабочих дней.
        </p>
        <p style="font-size: 14px;">3.2.8. В случае внесения изменений в Налоговый кодекс Кыргызской Республики, если
            такие изменения повлекут для Продавца необходимость уплаты суммы налогов от продажи нежилого помещения
            больше чем, если бы Продавец уплачивал до внесения таких изменений, Покупатель обязан доплатить такую
            разницу Продавцу. </p>
        <p style="font-size: 14px;"><b>3.3. Покупатель по настоящему Договору обязуется:</b></p>
        <p style="font-size: 14px;">3.3.1. Осуществлять оплату стоимости нежилого помещения в порядке и сроки,
            предусмотренные настоящим Договором. </p>
        <p style="font-size: 14px;">3.3.2. Принять нежилое помещение по акту приема-передачи в течение – 7 (семи)
            календарных дней с момента уведомления Продавцом. (смс, эл. Письмо, эл. Сообщение и т.д.). </p>
        <p style="font-size: 14px;">3.3.3. Заключить с Продавцом основной договор купли-продажи парковочного места в ГУ
            “Кадастр” (при необходимости в нотариальной конторе) в порядке и сроки, предусмотренные настоящим Договором.
        </p>
        <p style="font-size: 14px;">3.3.4. Покупатель обязуется выплачивать стоимость услуг по содержанию объекта и иные
            услуги по тарифам уполномоченных государственных органов и коммерческих организаций, оказывающих
            коммунальные услуги. </p>
        <p style="font-size: 14px;"><b>3.4. Покупатель по настоящему Договору имеет право:</b></p>
        <p style="font-size: 14px;">3.4.1. Требовать от Продавца исполнения обязательств, предусмотренных настоящим
            Договором.</p>
        <p style="font-size: 14px;">3.4.3. В одностороннем порядке расторгнуть настоящий Договор при наличии оснований,
            предусмотренных настоящим Договором. </p>
        <p style="font-size: 14px;">3.4.4. Уступить с согласия Продавца права по настоящему Договору в пользу третьего
            лица, только в случае, если Покупателем оплачено полная стоимость Парковочного места.</p>
        <br>
        <h4 style="text-align: center;">4. ОТВЕТСТВЕННОСТЬ СТОРОН</h4>
        <br>
        <p style="font-size: 14px;">4.1. Стороны несут ответственность за неисполнение или ненадлежащее исполнение
            принятых на себя обязательств в соответствии с условиями настоящего Договора и требованиями законодательства
            Кыргызской Республики.</p>
        <p style="font-size: 14px;">4.2. В случае досрочного расторжения настоящего Договора Покупателем при отсутствии
            вины Продавца, а также Продавцом при неисполнении или ненадлежащим исполнении Покупателем своих обязательств
            и условий настоящего Договора, Продавец обязуется осуществить возврат оплаченных Покупателем денежных
            средств. При этом такой возврат денежных средств Покупателю производится только после реализации указанного
            Парковочного места Продавцом третьим лицам Парковочного места.</p>
        <p style="font-size: 14px;">4.3. Продавец вправе начислить штраф Покупателю за несвоевременное выполнение
            Покупателем обязательства по регистрации основного договора купли-продажи Нежилого помещения в ГУ «Кадастр»
            в срок, указанный п. 1.2. Договора, в размере 5`000 (пять тысячи) сом.</p>
        <p style="font-size: 14px;">4.4. Продавец не несет ответственности за возможные веерные отключения
            электроэнергии на объекте, независящие от Продавца, которые могут повлиять на работоспособность
            электроприборов и/или иного оборудования Покупателя, и/или наступление форс-мажорных обстоятельств,
            связанных с временными перебоями/отключениями электроэнергии.</p>
        <p style="font-size: 14px;">4.5. Риск случайной гибели или случайной порчи/повреждения Нежилого помещения после
            ее передачи Продавцом по акту в соответствии с условиями настоящего Договора, несет Покупатель, включая
            ответственность за действия/бездействия в отношении сохранности мест общего пользования на объекте.</p>
        <p style="font-size: 14px;">4.6. Продавец не несет ответственности за любые претензии уполномоченных
            государственных органов и/или иных третьих лиц относительно содержания и охраны нежилого помещения с момента
            передачи нежилого помещения Покупателю в порядке, предусмотренном Договором, включая противоправные действия
            Покупателя или третьих лиц, допущенных Покупателем, нарушающие законодательство КР.</p>
        <p style="font-size: 14px;">4.7. Покупатель после принятия нежилого помещения по акту приема передачи
            самостоятельно несет ответственность за санитарно-техническое состояние нежилого помещения, сохранность
            внутренних конструкций, инженерных коммуникаций, расположенных в нежилом помещении, включая соблюдение
            пожарной безопасности.</p>
        <br>
        <h4 style="text-align: center;">5. ФОРС-МАЖОР</h4>
        <br>
        <p style="font-size: 14px;">5.1. Стороны освобождаются от ответственности за частичное или полное неисполнение
            обязательств по настоящему Договору, если это неисполнение явилось следствием обстоятельств непреодолимой
            силы (форс-мажорных обстоятельств), возникших после заключения настоящего Договора, то есть в результате
            действия обстоятельств чрезвычайного характера, которые Стороны не могли предвидеть и предотвратить
            разумными мерами.</p>
        <p style="font-size: 14px; margin-right: 5%;"> К таким обстоятельствам чрезвычайного характера относятся:
            наводнения, пожар, землетрясения и иные стихийные бедствия, гражданская война, народные волнения, массовые
            беспорядки, военные действия на территории Кыргызской Республики, издание органом государственной власти или
            местного самоуправления нормативного (ненормативного) правового акта, препятствующему выполнение Сторонами
            своих обязательств по настоящему Договору.</p>
        <p style="font-size: 14px;">5.2. При наступлении обстоятельств, указанных в п. 5.1 Договора, Сторона по
            настоящему Договору, для которой создалась невозможность исполнения ее обязательств по Договору, должна в
            кратчайший срок известить о них в письменном виде другую Сторону и принять все необходимые меры для
            надлежащего исполнения своих обязательств по Договору после прекращения действия форс-мажорных
            обстоятельств.</p>
        <p style="font-size: 14px;">5.3. При наступлении обстоятельств экономического спада, таких как: стагнация,
            рецессия и т.д., стороны соразмерно продолжительности таких обстоятельств увеличивают (пересматривают) сроки
            строительства, о чем будет заключено дополнительное соглашение к настоящему Договору.</p>
        <p style="font-size: 14px; margin-right: 5%;"></p>
        <p style="font-size: 14px;"> Под экономическим спадом, рецессией по смыслу настоящего подпункта понимается такая
            ситуация на рынке недвижимости Кыргызской Республики длящаяся более 3-х месяцев, когда объемы продаж жилых и
            нежилых помещений на первичном рынке недвижимости падают/сокращаются (более чем 50 %) от предыдущих объемов
            продаж при условии, что продажная цена в предыдущем и текущем периоде остается неизменной.</p>
        <p style="font-size: 14px;">5.4. Стороны настоящим Договором определили, что при наличии форс-мажорных
            обстоятельств, сроки исполнения Сторонами обязательств передвигается на срок, соразмерный сроку действия
            форс-мажорных обстоятельств.</p>
        <br>
        <h4 style="text-align: center;">6. ОСОБЫЕ УСЛОВИЯ</h4>
        <br>
        <p style="font-size: 14px;"> Оплата производится только по курсу «НБКР» (Национальный банк Кыргызской
            Республики). </p>
        <br>
        <h4 style="text-align: center;">7. СРОК ДЕЙСТВИЯ И УСЛОВИЯ РАСТОРЖЕНИЯ ДОГОВОРА</h4>
        <br>
        <p style="font-size: 14px;">7.1. Настоящий Договор вступает в силу с момента подписания Сторонами, и действует
            до момента полного исполнения Сторонами обязательств по нему. </p>
        <p style="font-size: 14px;">7.2. Настоящий Договор, может быть, расторгнут по взаимному письменному согласию
            Сторон, а также в случаях, предусмотренных настоящим Договором и законодательством Кыргызской Республики.
        </p>
        <p style="font-size: 14px;">7.3. Настоящий Договор, может быть, расторгнут одной из Сторон в одностороннем
            порядке без обращения в суд в случае, если будет иметь место существенное нарушение условий Договора.
            Договор считается расторгнутым по истечении 7 (семи) календарных дней с момента направления Покупателю
            Продавцом уведомления. Надлежащим уведомлением об одностороннем расторжении Договора со стороны Продавца
            считается отправленное в адрес Покупателя уведомление в порядке, предусмотренном п.8.5. настоящего Договора.
        </p>
        <p style="font-size: 14px;"><span style="margin-left: 5%;">При</span> этом Продавец во внесудебном порядке
            вправе изъять из пользования Покупателя, принадлежащую Продавцу парковочное место на основании настоящего
            Договора. В случае расторжения настоящего Договора Продавцом в порядке, предусмотренном настоящим пунктом,
            либо Покупателем при отсутствии оснований, предусмотренных Договором, Продавец вправе распоряжаться
            парковочным местам по своему усмотрению, включая право реализовать ее третьим лицам, с определением в
            одностороннем порядке рыночной стоимости парковочного места и обязанностью возврата Покупателю уплаченных
            денежных средств за парковочное место предусмотренной пунктом 2.1.2. настоящего Договора. </p>
        <p style="font-size: 14px;"><span style="margin-left: 5%;">При</span> этом такой возврат денежных средств
            Покупателю производится только после реализации Продавцом указанного парковочного места третьим лицам.</p>
        <p style="font-size: 14px;">7.4. Стороны определили следующие существенные нарушения условий Договора, при
            котором Стороны могут в одностороннем порядке расторгнуть настоящий Договор.</p>
        <br>
        <h4 style="text-align: center;">8. ЗАКЛЮЧИТЕЛЬНЫЕ ПОЛОЖЕНИЯ</h4>
        <br>
        <p style="font-size: 14px;">8.1. Любые изменения и дополнения к настоящему Договору имеют силу в том случае,
            если они оформлены в письменном виде и подписаны обеими Сторонами.</p>
        <p style="font-size: 14px;">8.2. Стороны настоящим Договором определили, что все отношения между Сторонами носят
            сугубо конфиденциальный характер, в связи, с чем каждая из Сторон обязуется не передавать и не разглашать
            третьим лицам информацию, касающуюся настоящего Договора, кроме случаев, оговоренных действующим
            законодательством Кыргызской Республики.</p>
        <p style="font-size: 14px;">8.3. Все споры или разногласия, возникающие между Сторонами по настоящему Договору
            или в связи с ним, разрешается путем переговоров между Сторонами. В случае невозможности разрешения
            разногласий путем переговоров любые споры, возникающие и/или связанные с настоящим Договором, подлежат
            разрешению в суде в установленном законодательством Кыргызской Республики порядке. </p>
        <p style="font-size: 14px;">8.4. Стороны определили, что в случае, если одна из Сторон в последующем будет
            уклоняться от заключения основного договора купли-продажи парковочного места, другая Сторона вправе обязать
            эту Сторону заключить основной договор в порядке, предусмотренном пунктом 4 статьи 406 Гражданского кодекса
            Кыргызской Республики.</p>
        <p style="font-size: 14px;">8.5. Все письма, сообщения, уведомления и иные документы, отправленные Продавцом на
            адреса, указанные в Договоре, в настоящем Соглашении и/или по последним известным контактам Покупателя
            посредством телефонограммы, электронного сообщения, WhatsApp сообщения или SMS сообщения считаются
            юридически доставленными Покупателю и имеют силу письменного уведомления. </p>
        <p style="font-size: 14px;">8.6. Настоящий Договор составлен в 2 (двух) экземплярах на русском языке, имеющих
            одинаковую юридическую силу, по одному экземпляру для каждой из Сторон. Обязательства по регистрации
            настоящего Договора в компетентных органах Кыргызской Республики возлагаются на Покупателя.</p>
        <br>
        <h4 style="text-align: center;"> 9. АДРЕСА И ПОДПИСИ СТОРОН</h4>
        <br>
        <div style="display: flex">
            <div style="width: 45%; margin-right: 5%;">
                <h4 style="font-size: 16px;">«ПРОДАВЕЦ»:</h4>
                <h4 style="font-size: 16px;">ОсОО «Бизнес Хаус КГ»</h4>
                <p style="font-size: 16px;">Кыргызская Республика,<br> Ошская область , Кара-Суйский район ,<br> село
                    Кызыл-Кыштак,<br> ул. Курманжан Датка, дом 584. <br /> ИНН 02401200210238 <br /> ОКПО 22865098
                    <br /> ЗАО «Демир Кыргыз Интернешнл Банк» <br /> г. Ош ул. Курманжан Датка 180 А <br /> БИК
                    118002<br> Тел. (3222)5 -65-55, факс 5-65-65 <br /> Наименование получателя: ОсОО « Бизнес<br> Хаус
                    КГ » <br /> Р\с KGS №1180000189898625</p>
                <br>
                <br>
                <p style="font-size: 15px;"><b>Генеральный директор </b></p>
                <p style="font-size: 15px;">М.П. ___________/Таджибаев М.М./</p>
                <p style="font-size: 15px; margin-left: 10%;">(подпись)</p>
            </div>

            <div style="width: 45%; margin-left: 5%;">
                <h4 style="font-size: 16px;">ПОКУПАТЕЛЬ:</h4>
                <h4 style="font-size: 16px;">{{ $data['last_name'] }} {{ $data['first_name'] }}
                    {{ $data['middle_name'] }}</h4>
                <p style="font-size: 16px;"><b>{{ date('d.m.Y', strtotime($data['birth_date'])) }} </b> года рождения,
                    Паспорт<br><b>{{ $data['series_number'] }}, от
                        {{ date('d.m.Y', strtotime($data['given_date'])) }}</b> года
                    <br /><b>{{ $data['issued_by'] }}, ИНН {{ $data['inn'] }}</b><br> проживающий по адресу :
                    {{ $data['live_address'] }} <br /> Контакты: <b>+996 {{ $data['phone_number'] }}</b> <br />
                    E-mail: {{ $data['email'] }} </p>
                <p style="font-size: 16px;"><b>{{ $data['last_name'] }} {{ $data['first_name'] }}
                        {{ $data['middle_name'] }}</b></p>
                <p style="font-size: 16px;">___________/____________________</p>
                <p style="font-size: 16px; margin-left: 15%;">(подпись) <span style="margin-left: 15%;">(Ф.И.О.)</span></p>
            </div>
        </div>
    </div>
</div>

<div class="url_div" data-url="{{ $url }}"></div>
<!-- </html> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('/backend-assets/forthebuilders/javascript/jquery-3.6.1.js') }}"></script>

<script>
    $(document).ready(function() {
        var divToPrint = document.getElementById('DivIdToPrint');
        var newWin = window.open('', 'Print-Window');
        newWin.document.open();
        newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML +
            '</body></html>');
        newWin.document.close();
        newWin.onafterprint = window.close;

        var url = $('.url_div').attr('data-url')
        setTimeout(function() {
            var showId = $('#showId').val();
            location.href = url;
        }, 10);
        // setTimeout(function() {
        //     newWin.close();
        // }, 50);
    })

    // $(document).ready(function() {
    //     window.print();
    // })
</script>
