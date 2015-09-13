<?php
/**
Template Name: Basic
 */
?>
<?php get_header(); ?>

<?php
if ( has_post_thumbnail() ) : ?>
    <!--section class="innerphotoBox">
        <?php the_post_thumbnail(); ?>
    </section-->
<?php endif; ?>

<div class="within inner basic">
    <?php the_breadcrumb(); ?>
    <h1><?php the_title(); ?></h1>
    <div class="clear"></div>

    <!--div class="sideBar">
        <div id="pimaryMenu">
            <ul class="primHolder">
                <li class="has-sub"><a href="#">Membership<i class="fa fa-angle-down right"></i></a>
                    <ul>
                        <li><a href="#">Become a Member<i class="fa fa-angle-right right"></i></a></li>
                        <li><a href="#">Corporate Membership<i class="fa fa-angle-right right"></i></a></li>
                        <li><a href="#">Yoga by YYoga<i class="fa fa-angle-right right"></i></a></li>
                        <li><a href="#">My Membership<i class="fa fa-angle-right right"></i></a></li>
                    </ul>
                </li>
                <li class="has-sub"><a href="#">Drop-In<i class="fa fa-angle-down right"></i></a>
                    <ul>
                        <li><a href="#">Become a Member<i class="fa fa-angle-right right"></i></a></li>
                        <li><a href="#">Corporate Membership<i class="fa fa-angle-right right"></i></a></li>
                        <li><a href="#">Yoga by YYoga<i class="fa fa-angle-right right"></i></a></li>
                        <li><a href="#">My Membership<i class="fa fa-angle-right right"></i></a></li>
                    </ul>
                </li>
                <li><a href="#">Fitness + Wellness<i class="fa fa-angle-down right"></i></a></li>
                <li><a href="#">Community Sport<i class="fa fa-angle-down right"></i></a></li>
                <li><a href="#">Events + Rentals<i class="fa fa-angle-down right"></i></a></li>
            </ul>
        </div>
    </div--><!-- /sideBar -->


    <div class="content">
        <?php if ( is_active_sidebar( 'inner-promo-right' ) ) { ?>
            <div class="sideBar promo">
                <div class="newsHolder w-4">
                    <?php dynamic_sidebar('inner-promo-right');?>
                </div>
            </div><!-- /sideBar right -->
        <?php } ?>

        <?php if ( have_posts() ) : while( have_posts() ) : the_post();
            the_content();
        endwhile; endif; ?>

        <!--<p>In an effort to maximize the entrepreneurial benefit and financial viability of the Oval, the Richmond Olympic Oval Corporation was incorporated in 2010 as a municipal corporation under the Business Corporations Act of British Columbia. Its purpose is to manage the business, operations and maintenance of the Oval. The corporation has a single Shareholder, the City of Richmond, who has appointed a Board of Directors, consisting of a selection of community business leaders from Richmond and the Metro Vancouver area with a broad range of specialized expertise, to govern the Oval. The Corporation is fully accountable to its shareholder, who receives quarterly financial statements and regular operational updates on the performance of its corporation.</p>
        <h3>Some title</h3>
        <p>The Richmond Olympic Oval is a breathtaking venue on the banks of the Fraser River and winner of the Institution of Structural Engineers top award for Sports or Leisure Structures. Home to long track speed skating during the 2010 Olympic Winter Games, the Oval has been transformed into the legacy vision first conceived by the City of Richmond in 2004 – an international centre of excellence for sports, health and wellness, culture and entertainment.</p>
        <p><img width="239" height="320" alt="ostrich" src="http://fountain.bitorbit.biz/wp-content/uploads/2014/11/ostrich-239x320.png" class="alignright wp-image-62 size-medium"></p>
        <p>In sint efficiantur liberavisse sit. <span style="text-decoration: underline;">Sed eu diam vidisse menandri</span>, cu vis vidisse dignissim, minim viris ad mei. Congue tamquam veritus ea quo, invenire corrumpit eam ne, pro fabulas corpora an.</p>
        <p>Vis eu iusto assueverit, consul invidunt id duo. <del>Minim eruditi pro ad, quod accumsan antiopam eu vim</del>. Sumo feugiat percipitur ei eam. Id graece explicari eos. Cu quo quidam efficiantur.&nbsp;<strong>Alterum meliore quaerendum in ius.</strong></p>
        <p>Cum eu ullum libris definitiones, ei nostro inciderint persequeris sea. Munere verterem dignissim cum an. Nulla scriptorem eum id, ne mentitum postulant cum, <a href="http://www.example.com">ne tale ferri munere his, has brute hendrerit in.</a></p>
        <blockquote><p>Quo ne cibo laudem suscipiantur, liber consequat accommodare his id. Usu dicit expetendis no, albucius sententiae signiferumque eam eu. At quando nominavi inimicus usu. Appareat vulputate quo ad. Discere nonumes habemus ex cum, ei solum dicat quando duo. Tale decore blandit ut est, debitis maiestatis dissentiunt eu eos, feugait perpetua intellegat ne mea.</p></blockquote>
        <h1>Heading 1</h1>
        <h2>Heading 2</h2>
        <h3>Heading 3</h3>
        <h4>Heading 4</h4>
        <h5>Heading 5</h5>
        <h6>Heading 6</h6>
        <hr>
        <p style="text-align: center;">Cibo option platonem et cum. Delenit mentitum antiopam quo no, ei eum tamquam incorrupte. Dicunt virtute vivendo vel cu, eu doctus denique corrumpit vis, vix no discere percipitur. Offendit voluptatibus vel at, apeirian atomorum rationibus mei no. Mei nihil laudem an.</p>
        <hr>
        <p style="text-align: right;">Pro no alia praesent conceptam. Cu nec choro impetus, quo ad odio deleniti praesent, duo an offendit necessitatibus. Convenire intellegat et vel. In vix viderer albucius reformidans. At tibique recteque sadipscing usu, no has postea recusabo senserit, id eum vidisse integre dissentiet. Ei sea graece qualisque signiferumque, ipsum clita pertinax ut pro, ut qui nihil habemus instructior. Vix ea nostro admodum intellegat, mea laudem molestiae et. Mei nihil laudem an. Cu dicam epicurei mei, magna maiorum his te. Nusquam accusata cu sea, sint decore ne his.</p>
        <hr>
        <p style="text-align: justify;"><img width="320" height="205" alt="womanclip" src="http://fountain.bitorbit.biz/wp-content/uploads/2014/11/womanclip-320x205.png" class="alignleft wp-image-72 size-medium">Veniam argumentum reformidans et vix, eam petentium imperdiet an. Facilis facilisis mnesarchum cum ei. Inani audire praesent sit ut, fabulas definiebas consequuntur no eam, vim an amet malis graeci. Ei sadipscing consectetuer vel, an vix aperiam voluptaria. Ea facilis forensibus voluptatibus eum, sed zril audire ad, ne veniam persius mea.&nbsp;Est ut vero malis, ex mea legere explicari voluptaria. Mundi numquam mea an, ei per cetero bonorum dolores. Vel no doming doctus definiebas, te nullam legimus legendos sed.</p>
        <hr>
        <p>Per an nostrud voluptatum. Mel ut rebum fierent. Eu his nisl suas vitae, duo cu dicit ceteros tincidunt, facer aperiam tritani an eos. Sit error dolores cu. Sit no volumus suscipit, mel ut timeam accusata. Clita iisque ea vix, est ad mollis oportere.</p>
        <h2>Heading Two Albucius Inimicus</h2>
        <p>Vis albucius inimicus at, in labores inermis facilisi eum, singulis repudiare ex ius. At error vivendo duo, quo ad dictas tamquam intellegam, cu velit simul munere vel. Has ei atqui laboramus. Eum id quas tantas vivendo.</p>
        <ul>
            <li>Sea nominavi sensibus</li>
            <li>Eam ei nonumy prompta</li>
            <li>Tollit invenire vis in</li>
        </ul>
        <p>Essent delenit corrumpit ea mel, oblique complectitur vel ex, purto feugiat ius at. Mentitum delectus vel no, amet omittam perfecto ne has, regione mentitum maiestatis eos an. Ei per nisl omnis facilisi, dicant dicunt dissentias at nam. Suas prodesset mel eu. Ex alienum sapientem mel, docendi quaerendum theophrastus an per.</p>
        <h3>Heading Three Accusamus Voluptatum</h3>
        <p>Tota repudiare rationibus vim te, mea eu accusamus voluptatum. Sea falli assueverit an, est ne primis forensibus. Probo choro ea vel. Pro detracto accusata hendrerit et, scripta corrumpit delicatissimi te cum, mei quot accommodare ne.</p>
        <ol>
            <li>Convenire intellegat</li>
            <li>Pro no alia praesent</li>
            <li>Vix ea nostro&nbsp;admodum</li>
        </ol>
        <p>Id velit decore definiebas vel, an hinc iudico indoctum vis. Ullum euismod explicari per te. At exerci salutatus moderatius eum, summo possim deleniti ei pro, vim ea vide persequeris. Pro facer similique cu, eam erat quaestio an.</p>
        <h4>Heading Four Erant Dolorem Scribentur</h4>
        <p>Mei conceptam accommodare eu, ut cum reque nobis, at unum laoreet pri. Illud electram mei ut, ius id erant dolorem scribentur, id mea laudem voluptaria. Usu in quod nihil omnium, ex sadipscing definitionem eum. Cibo sonet nam ne, platonem percipitur ea qui. Te facilisi iudicabit signiferumque eam, delectus signiferumque quo ea.</p>
        <p><em>Vis ut aeque nobis facilis. Id vix reque ponderum repudiare, eam ne quis omnium partiendo, no albucius complectitur vix. His omnium ceteros accusam ex, ut postulant concludaturque ius.</em></p>
        <pre><code>10 LET a$="abcdef"
                20 FOR n=1 TO 6
                30 PRINT a$(n TO 6)
                40 NEXT n
                50 STOP
            </code></pre>
        <p>Dicat verterem vel ei, in amet consul imperdiet per. Mea ei tibique detraxit principes. Solum malorum accommodare te cum, debitis lobortis te eum. Vel latine tractatos te, appareat apeirian pro ex, in vidit mundi viderer duo. At qui alia causae quaeque, et justo fabellas menandri cum. Sea falli assueverit an, est ne primis forensibus. In sint efficiantur liberavisse sit.</p>
        <p>Single line blockquote:</p>
        <blockquote><p>Stay hungry. Stay foolish.</p></blockquote>
        <p>Multi line blockquote with a cite reference:</p>
        <blockquote><p>People think focus means saying yes to the thing you’ve got to focus on. But that’s not what it means at all. It means saying no to the hundred other good ideas that there are. You have to pick carefully. I’m actually as proud of the things we haven’t done as the things I have done. Innovation is saying no to 1,000 things. <cite>Steve Jobs &ndash; Apple Worldwide Developers’ Conference, 1997</cite></p></blockquote>
        <h2>Tables</h2>
        <table>
            <tbody>
            <tr>
                <th>Employee</th>
                <th class="views">Salary</th>
                <th></th>
            </tr>
            <tr class="odd">
                <td><a href="http://john.do/">John Saddington</a></td>
                <td>$1</td>
                <td>Because that’s all Steve Job’ needed for a salary.</td>
            </tr>
            <tr class="even">
                <td><a href="http://tommcfarlin.com/">Tom McFarlin</a></td>
                <td>$100K</td>
                <td>For all the blogging he does.</td>
            </tr>
            <tr class="odd">
                <td><a href="http://jarederickson.com/">Jared Erickson</a></td>
                <td>$100M</td>
                <td>Pictures are worth a thousand words, right? So Tom x 1,000.</td>
            </tr>
            <tr class="even">
                <td><a href="http://chrisam.es/">Chris Ames</a></td>
                <td>$100B</td>
                <td>With hair like that?! Enough said…</td>
            </tr>
            </tbody>
        </table>
        <h2>Definition Lists</h2>
        <dl>
            <dt>Definition List Title</dt>
            <dd>Definition list division.</dd>
            <dt>Startup</dt>
            <dd>A startup company or startup is a company or temporary organization designed to search for a repeatable and scalable business model.</dd>
            <dt>#dowork</dt>
            <dd>Coined by Rob Dyrdek and his personal body guard Christopher “Big Black” Boykins, “Do Work” works as a self motivator, to motivating your friends.</dd>
            <dt>Do It Live</dt>
            <dd>I’ll let Bill O’Reilly will <a href="https://www.youtube.com/watch?v=O_HyZ5aW76c" title="We'll Do It Live">explain</a> this one.</dd>
        </dl>
        <h2>Unordered Lists (Nested)</h2>
        <ul>
            <li>List item one
                <ul>
                    <li>List item one
                        <ul>
                            <li>List item one</li>
                            <li>List item two</li>
                            <li>List item three</li>
                            <li>List item four</li>
                        </ul>
                    </li>
                    <li>List item two</li>
                    <li>List item three</li>
                    <li>List item four</li>
                </ul>
            </li>
            <li>List item two</li>
            <li>List item three</li>
            <li>List item four</li>
        </ul>
        <h2>Ordered List (Nested)</h2>
        <ol>
            <li>List item one
                <ol>
                    <li>List item one
                        <ol>
                            <li>List item one</li>
                            <li>List item two</li>
                            <li>List item three</li>
                            <li>List item four</li>
                        </ol>
                    </li>
                    <li>List item two</li>
                    <li>List item three</li>
                    <li>List item four</li>
                </ol>
            </li>
            <li>List item two</li>
            <li>List item three</li>
            <li>List item four</li>
        </ol>
        <h2>HTML Tags</h2>
        <p>These supported tags come from the WordPress.com code <a href="http://en.support.wordpress.com/code/" title="Code">FAQ</a>.</p>
        <p><strong>Address Tag</strong></p>
        <address>1 Infinite Loop<br>
            Cupertino, CA 95014<br>
            United States</address>
        <p><strong>Anchor Tag (aka. Link)</strong></p>
        <p>This is an example of a <a href="http://apple.com" title="Apple">link</a>.</p>
        <p><strong>Abbreviation Tag</strong></p>
        <p>The abbreviation <abbr title="Seriously">srsly</abbr> stands for “seriously”.</p>
        <p><strong>Acronym Tag</strong></p>
        <p>The acronym <acronym title="For The Win">ftw</acronym> stands for “for the win”.</p>
        <p><strong>Big Tag</strong></p>
        <p>These tests are a <big>big</big> deal, but this tag is no longer supported in HTML5.</p>
        <p><strong>Cite Tag</strong></p>
        <p>“Code is poetry.” &ndash;<cite>Automattic</cite></p>
        <p><strong>Code Tag</strong></p>
        <p>You will learn later on in these tests that <code>word-wrap: break-word;</code> will be your best friend.</p>
        <p><strong>Delete Tag</strong></p>
        <p>This tag will let you <del>strikeout text</del>, but this tag is no longer supported in HTML5 (use the <code>&lt;strike&gt;</code> instead).</p>
        <p><strong>Emphasize Tag</strong></p>
        <p>The emphasize tag should <em>italicize</em> text.</p>
        <p><strong>Insert Tag</strong></p>
        <p>This tag should denote <ins>inserted</ins> text.</p>
        <p><strong>Keyboard Tag</strong></p>
        <p>This scarsly known tag emulates <kbd>keyboard text</kbd>, which is usually styled like the <code>&lt;code&gt;</code> tag.</p>
        <p><strong>Preformatted Tag</strong></p>
        <p>This tag styles large blocks of code.</p>
        <p><strong>Quote Tag</strong></p>
        <p><q>Developers, developers, developers…</q> &ndash;Steve Ballmer</p>
        <p><strong>Strong Tag</strong></p>
        <p>This tag shows <strong>bold<strong> text.</strong></strong></p>
        <p><strong>Subscript Tag</strong></p>
        <p>Getting our science styling on with H<sub>2</sub>O, which should push the “2″ down.</p>
        <p><strong>Superscript Tag</strong></p>
        <p>Still sticking with science and Albert Einstein’s&nbsp;E = MC<sup>2</sup>, which should lift the “2″ up.</p>
        <p><strong>Teletype Tag</strong></p>
        <p>This rarely used tag emulates <tt>teletype text</tt>, which is usually styled like the <code>&lt;code&gt;</code> tag.</p>
        <p><strong>Variable Tag</strong></p>
        <p>This allows you to denote <var>variables</var>.</p>-->
        
    </div><!-- /content -->

</div><!-- /within -->
<section class="eventBox">
    <div class="within">
        <p><a href="#"> &gt;&gt;&gt;  Click here to Book an event  &lt;&lt;&lt; </a></p>
    </div>
</section>

<?php get_footer(); ?>


