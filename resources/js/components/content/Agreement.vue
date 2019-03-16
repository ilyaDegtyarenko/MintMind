<template>
    <div id="agreement-wrapper" :class="agreementWrapperClass">
        <div v-if="locale === 'ru'">
            <h1>ПОЛЬЗОВАТЕЛЬСКОЕ СОГЛАШЕНИЕ</h1>

            <p>
                Пользовательское соглашение (далее "Соглашение"/"соглашение") регулирует отношения между администрацией (далее "MintMind" или "Администрация"/"администрация") с одной стороны и пользователем с другой.
                <br><br>Сайт "MintMind" не является средством массовой информации и не ведет каких-либо тесных взаимосвязей с политическими или узкоспециальными учреждениями.
                <br>Проект максимально независим и управляется исключительно Администрацией Сайта.
            </p>

            <p>
                Используя сайт, Вы соглашаетесь с условиями данного соглашения. Если Вы не согласны с условиями данного соглашения, не пользуйтесь данным сервисом.
            </p>

            <h2>РЕГИСТРАЦИЯ И ПРАВИЛА ПОВЕДЕНИЯ НА САЙТЕ</h2>
            <p>
                Использование полных функциональных возможностей Сайта, включая использование Сервисов, допускается только после прохождения Пользователем регистрации и авторизации на Сайте в соответствии с установленной Администрацией процедурой.
                <br><br>Любые действия, совершённые из под учётной записи Пользователя, считаются совершёнными соответствующим Пользователем.
                <br><br>В случае несанкционированного доступа к учётной записи Пользователя, или распространения доступа, Пользователь обязан незамедлительно сообщить об этом Администрации, либо, на свой страх и риск, ограничиться самостоятельной сменой доступа к аккаунту (изменение личных данных, смена пароля).
            </p>
            <p><br>Пользователь обязуется использовать сайт только в законных целях.
                <br><br>Пользователь обязуется не размещать на сайте и не направлять куда-либо через/посредством Сайта любые материалы следующего характера:
                <br>— нарушающие законодательство, содержащие угрозы или оскорбления, дискредитирующие других лиц, нарушающие права граждан на частную жизнь или публичный порядок, носящие характер непристойности
                <br>— нарушающие, в той или иной степени, честь и достоинство, права и охраняемые законом интересы других лиц
                <br>— способствующие или содержащие призывы к разжиганию религиозной, расовой или межнациональной розни, содержащие попытки разжигания вражды или призывы к насилию
                <br>— спам, вирусные материалы, несанкционированную рекламу
            </p>

            <br>

            <p>
                А также иные материалы, которые побуждают других лиц на противоправное поведение, влекущее уголовную, гражданско-правовую и иную ответственность или каким-либо образом нарушающее положения законодательства.
                <br><br>Пользователь гарантирует, что обладает всеми необходимыми правами на использование материалов, размещаемых им на Сайте, а также получил согласие всех лиц, изображенных в материалах, на такое использование.
                <br><br>Пользователь гарантирует, что размещение материалов на Сайте и их использование не нарушает какие-либо права третьих лиц (в том числе авторские, смежные и пр.).
            </p>

            <h2>РАЗМЕЩЕНИЕ МАТЕРИАЛОВ НА САЙТЕ</h2>
            <p>
                Пользователь соглашается с тем, что он несёт единоличную полную ответственность в отношение размещаемых на Сайте материалов, в том числе, за содержание таких материалов, соответствие их требованиям законодательства, за нарушения прав третьих лиц на размещаемые Пользователем материалы и возмещает любой ущерб, возникающий вследствие таких нарушений, а также любой ущерб, возникающий вследствие загрузки на Сайт таких материалов.
                <br><br>Пользователь обязуется ни загружать, ни размещать или иным образом использовать на Сайте какие-либо материалы, охраняемые законодательством об интеллектуальной собственности (в том числе, авторским правом, законодательством о товарных знаках), и иные охраняемые законодательством материалы без получения письменного разрешения обладателя прав на охраняемый материал.
                <br>При этом бремя установления того, что размещение на Сайте Пользователем материалов не нарушает авторские, смежные и иные права третьих лиц на размещаемые материалы, лежит на Пользователе.
                <br><br>При размещении каких-либо материалов на Сайте для всеобщего пользования, Пользователь тем самым автоматически предоставляет Администрации (или подтверждает, что владелец таких материалов предоставил Администрации) безвозмездное, постоянное, безотзывное, неисключительное право на использование, воспроизведение, изменение, редактирование, копирование, опубликование, перевод и распространение таких материалов (частично или полностью) на территории всех стран мира и/или включение таких материалов в другие произведения в любой форме посредством использования любых средств массовой информации или технологий, которые известны в настоящее время или могут быть изобретены в будущем, на весь срок охраны авторского права, предусмотренный законодательством, в отношении таких материалов.
                <br><br>Пользователь также разрешает доступ, просмотр, хранение или воспроизведение таких материалов другим Пользователям для личного использования.
            </p>
            <p>
                <br>Администрация вправе устанавливать лимиты по объёму и составу размещаемых Пользователем информационных материалов, а также вводить иные технические ограничения использования Сайта, которые время от времени будут доводиться до сведения Пользователей в форме и способом по выбору Администрации.
            </p>
            <p>
                <br>Администрация оставляет за собой право блокировать, исключать, удалять материалы с Сайта без согласия Пользователя, либо временно ограничить доступ к ним, если они не отвечают требованиям действующего законодательства и/или настоящего Соглашения.
            </p>

            <h2>ОТВЕТСТВЕННОСТЬ СТОРОН</h2>
            <p>
                — администрация обязуется поддерживать работоспособность сайта за исключением случаев, когда это невозможно по независящим от Администрации причинам
                <br>— администрация обязуется осуществлять разностороннюю защиту учетной записи Пользователя
                <br>— администрация имеет право накладывать цензуру на пользовательский контент, в ситуации передачи собственного контента пользователем третьим лицам, с целью соблюдения нормативных правил
                <br>— пользователь имеет право использовать информацию сайта в личных некоммерческих целях
                <br>— пользователь имеет право копировать информацию на другие сайты с разрешения правообладателя
                <br>— пользователь имеет право комментировать контент, выложенный на сайте
                <br>— пользователь лично несет полную ответственность за распространяемую им информацию
                <br>— пользователь обязуется при копировании информации с других источников, включать в её состав информацию об авторе
                <br>— пользователь обязуется не использовать скрипты (программы) для автоматизированного сбора информации и/или взаимодействия с Сайтом и его Сервисами
                <br>— администрация не несет никакой ответственности за достоверность информации, скопированной из других источников
                <br>— администрация не несёт ответственность за несовпадение ожидаемых Пользователем и реально полученных услуг
                <br>— администрация не несет никакой ответственности за услуги, предоставляемые третьими лицами
                <br>— администрация оставляет за собой право производить выборочно предварительную модерацию материалов, размещаемых пользователями, и в случае выявления нарушений законодательства либо положений настоящего Соглашения отклонить размещение.
                <br>— в случае возникновения форс-мажорной ситуации (боевые действия, чрезвычайное положение, стихийное бедствие и т. д.) Администрация не гарантирует сохранность информации, размещённой Пользователем, а также бесперебойную работу информационного ресурса
            </p>
            <p>
                <br>Пользователь принимает положение о том, что все материалы и сервисы Сайта или любая их часть могут сопровождаться рекламой.
                <br>Пользователь согласен с тем, что Администрация Сайта не несет какой-либо ответственности и не имеет каких-либо обязательств в связи с такой рекламой.
                <br><br>Комментарии и иные записи Пользователя на Сайте не должны вступать в противоречие с требованиями законодательства и общепринятых норм морали и нравственности.
                <br><br>Пользователь предупрежден о том, что Администрация Сайта не несет ответственности за посещение и использование им внешних ресурсов, ссылки на которые могут содержаться на сайте.
            </p>

            <h2>ИНФОРМАЦИЯ ДЛЯ ПРАВООБЛАДАТЕЛЕЙ</h2>
            <p>
                Сайт является общедоступным для всех зарегистрированных пользователей и предварительная модерация всех поступающих материалов не может осуществляться по объективным причинам.
                <br>В связи с этим Администрация Сайта не несет ответственности за размещаемую пользователями на Сайте информацию и материалы, однако прикладывает все возможные усилия для предотвращения и пресечения нарушений авторских прав на Сайте.
                <br><br>Пользователь обязуется внимательно ознакомиться с данным Соглашением.
                <br>В случае несогласия с его условиями Пользователь обязуется немедленно прекратить использование Сайта.
            </p>

            <h2>УСЛОВИЯ ДЕЙСТВИЯ СОГЛАШЕНИЯ</h2>
            <p>
                Регистрируясь на Сайте, Вы подтверждаете, что прочитали настоящее Соглашение и принимаете его условия.
                <br>При размещении материалов на Сайте Вы безвозмездно предоставляет Администрации Сайта неисключительные права на использование, воспроизведение, распространение, переработку, создание производных произведений, а также на демонстрацию материалов и доведение их до всеобщего сведения в рамках данного Сайта, также через/посредством Сайта.
            </p>
            <p>
                <br>Данное Соглашение вступает в силу при регистрации на сайте.
                <br>Соглашение перестает действовать при появлении его новой версии.
                <br>Администрация оставляет за собой право в одностороннем порядке изменять данное соглашение по своему усмотрению.
                <br>При изменении соглашения, в некоторых случаях, администрация может оповестить пользователей удобным для нее способом.
            </p>
        </div>

        <div v-else>
            <h1>USER AGREEMENT</h1>

            <p>
                The User Agreement (hereinafter referred to as the “Agreement” / “Agreement”) governs the relationship between the administration (hereinafter “MintMind” or “Administration” / “Administration”) on the one hand and the user on the other.
                <br>The site "MintMind" is not a mass medium and does not have any close links with political or specialized institutions.
                <br>The project is as independent as possible and is managed exclusively by the Site Administration.
            </p>

            <p>
                By using the site, you agree to the terms of this agreement. If you do not agree with the terms of this agreement, do not use this service.
            </p>

            <h2>REGISTRATION AND RULES OF CONDUCT ON THE SITE </h2>
            <p>
                The use of the full functionality of the Site, including the use of the Services, is allowed only after the User’s registration and authorization on the Site in accordance with the procedure established by the Administration.
                <br>Any actions performed from under the account of the User, are considered to be committed by the corresponding User.
                <br>In case of unauthorized access to the User’s account, or distribution of access, the User is obliged to immediately inform the Administration about this, or, at his own risk, limit himself to changing access to the account (changing personal data, changing the password).
            </p>
            <p>
                The user agrees to use the site only for legitimate purposes.
                <br>The User undertakes not to post on the site and not send any of the following materials through / through the Site:
                <br>- violating legislation, containing threats or insults, discrediting other persons, violating the rights of citizens to privacy or public order, in the nature of obscenity
                <br>- violate in varying degrees, honor and dignity, rights and legally protected interests of others
                <br>- promoting or containing incitement to incite religious, racial or ethnic hatred, containing attempts to incite hostility or incitement to violence
                <br>- spam, viral content, unauthorized advertising
            </p>

            <br>

            <p>
                As well as other materials that encourage other people to unlawful behavior, entailing criminal, civil and other liability or in any way violate the provisions of the law.
                <br>The User guarantees that he has all the necessary rights to use the materials posted by him on the Site, and also received the consent of all persons depicted in the materials for such use.
                <br>The User guarantees that the placement of materials on the Site and their use does not violate any rights of third parties (including copyright, related, etc.).
            </p>

            <h2>PLACEMENT OF MATERIALS ON THE SITE</h2>
            <p>
                The User agrees that he is solely solely responsible for the materials posted on the Site, including for the content of such materials, their compliance with legal requirements, for violations of the rights of third parties to the materials posted by the User and compensates for any damages arising as a result of such violations, as well as any damage arising as a result of uploading such materials to the Site.
                <br>The User undertakes not to upload, post or otherwise use on the Site any materials protected by intellectual property laws (including copyright, trademark law) and other materials protected by law without obtaining the written permission of the holder rights to protected material. At the same time, the burden of proving that the placement of materials on the Website by the User does not violate the copyright, related and other rights of third parties to the posted materials lies with the User.
                <br>When placing any materials on the Site for general use, the User thereby automatically grants the Administration (or confirms that the owner of such materials has provided the Administration) the gratuitous, permanent, irrevocable, non-exclusive right to use, reproduce, modify, copy , publication, translation and distribution of such materials (in whole or in part) on the territory of all countries of the world and / or inclusion of such materials in other works in any form through the use of any media or technology that is currently known or may be invented in the future, for the entire duration of copyright protection as provided by law for such materials.
                <br>The User also allows access to, viewing, storage or reproduction of such materials to other Users for personal use.
            </p>
            <p>
                The Administration has the right to set limits on the volume and composition of information materials posted by the User, as well as to introduce other technical restrictions on the use of the Site, which from time to time will be communicated to the Users in the form and method chosen by the Administration.
            </p>
            <p>
                The administration reserves the right to block, exclude, delete materials from the Site without the consent of the User, or temporarily restrict access to them if they do not meet the requirements of current legislation and / or this Agreement.
            </p>

            <h2>RESPONSIBILITY OF PARTIES</h2>
            <p>
                - the administration undertakes to maintain the functionality of the site, unless it is impossible for reasons beyond the control of the Administration
                <br>- the administration undertakes to provide comprehensive protection of the user account
                <br>- the administration has the right to impose censorship on user content, in a situation of transferring its own content to third parties by the user, in order to comply with regulatory rules
                <br>- the user has the right to use the site information for personal non-commercial purposes.
                <br>- user has the right to copy information to other sites with the permission of the copyright holder
                <br>- the user has the right to comment on the content posted on the site.
                <br>- the user is personally responsible for the information distributed by him.
                <br>- the user undertakes when copying information from other sources, to include in its structure information about the author
                <br>- the user undertakes not to use scripts (programs) for automated information gathering and / or interaction with the Site and its Services
                <br>- the administration is not responsible for the accuracy of the information copied from other sources.
                <br>- the administration is not responsible for the discrepancy between the expected and actually received services by the User
                <br>- the administration is not responsible for the services provided by third parties
                <br>- the administration reserves the right to selectively pre-moderate the materials posted by users, and in the case of violations of the law or the provisions of this Agreement, reject the placement.
                <br>- in case of a force majeure (fighting, emergency, natural disaster, etc.), the Administration does not guarantee the safety of information posted by the User, as well as the smooth operation of the information resource
            </p>
            <p>
                The user accepts that all materials and services of the Site or any part of them may be accompanied by advertising.
                <br>The user agrees that the Site Administration does not bear any responsibility and does not have any obligations in connection with such advertising.
                <br>Comments and other entries of the User on the Site should not conflict with the requirements of the legislation and generally accepted norms of morality and ethics.
                <br>The user is warned that the Site Administration is not responsible for his visit and use of external resources, links to which may be contained on the site.
            </p>

            <h2>INFORMATION FOR LAWYERS</h2>
            <p>
                The site is publicly available for all registered users and the preliminary moderation of all incoming materials can not be carried out for objective reasons.
                <br>In this regard, the Site Administration is not responsible for the information and materials posted by users on the Site, however it makes all possible efforts to prevent and suppress copyright infringements on the Site.
                <br>The user undertakes to carefully review this Agreement.
                <br>In case of disagreement with its terms, the User undertakes to immediately cease using the Site.
            </p>

            <h2>TERMS AND CONDITIONS OF THE AGREEMENT</h2>
            <p>
                By registering on the Site, you acknowledge that you have read this Agreement and accept its terms.
                <br>When posting materials on the Site, you donate to the Site Administration non-exclusive rights to use, reproduce, distribute, process, create derivative works, as well as to display materials and make them available to the public on this Site, also via / through the Site.
            </p>
            <p>
                <br>This Agreement takes effect when registering on the site.
                <br>The agreement is no longer valid when a new version of it appears.
                <br>The administration reserves the right to unilaterally amend this agreement at its discretion.
                <br>If the agreement is changed, in some cases, the administration may notify users in a convenient way.
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Agreement',
        props: {
            embed: {
                type: Boolean,
                default: false
            }
        },
        computed: {
            agreementWrapperClass() {
                return (this.embed ? '--embed' : '--page');
            },
            locale() {
                return window.locale;
            }
        }
    }
</script>

<style lang="scss" scoped>
    #agreement-wrapper {
        h1 {
            margin-right: 20px;
            margin-bottom: 10px;
            font-size: 1.8rem;
        }

        h2 {
            margin: 20px 0 5px 0;
            font-size: 1.2rem;
        }

        p {
            font-size: .8rem;
        }

        &.--embed {
            width: 70%;
            height: 75%;
            padding: 10px;
            overflow-y: auto;
            background: #fff;
            border: 2px solid var(--light-color);
            border-top-width: 25px;
            border-bottom-width: 25px;
            -webkit-box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12);
            -moz-box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12);
            box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12);

            &::-webkit-scrollbar {
                width: 12px;
                background-color: #fff;
            }

            &::-webkit-scrollbar-track {
                -webkit-box-shadow: inset 2px 2px 5px rgba(0, 0, 0, .1);
                -moz-box-shadow: inset 2px 2px 5px rgba(0, 0, 0, .1);
                box-shadow: inset 2px 2px 5px rgba(0, 0, 0, .1);
            }

            &::-webkit-scrollbar-thumb {
                background-color: var(--light-color);
                border: 1px solid #eee;
            }

            & > div {
                display: flex;
                flex-flow: column nowrap;

                p {
                    margin: 0;
                }
            }
        }

        &.--page > div {
            display: flex;
            margin: 20px;

            p {
                margin: 10px;
                padding: 10px;
            }
        }
    }
</style>