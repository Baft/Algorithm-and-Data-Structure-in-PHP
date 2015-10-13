#PHP-karatsuba-multiplication

<h2>Introduction</h2>
<p>Typically multiplying two n-digit numbers require n<sup>2</sup> multiplications. That is actually how we, humans, multiply numbers. Let’s take a look of an example in case we’ve to multiply two 2-digit numbers.</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre class="php" style="font-family:monospace;"><span style="color: #cc66cc;">12</span> x <span style="color: #cc66cc;">15</span> <span style="color: #339933;">=</span> ?</pre></td></tr></tbody></table></div>

<p>OK, we know that the answer is 180 and there are lots of intuitive methods that help us get the right answer. Indeed 12 x 15 it’s just a bit more difficult to calculate than 10 x 15, because multiplying by 10 it really easy – we just add one 0 at the end of the number. Thus 15 x 10 equals 150. But now again on 12 x 15 – we know that this equals 10 x 15 (which is 150) and 2 x 15, which is also very easy to calculate and it is 30. The result of 12×15 will be 150 + 30, which fortunately isn’t difficult to get and equals to 180.</p>
<p>That was easy but in some cases the calculations are a bit more difficult and we need a structured algorithm to get the right answer. What about 65 x 97? That is not so easy as 12 x 15, right?</p>
<p>The algorithm we know from the primary school, described on the diagram below, is well structured and help us multiply two numbers.</p>
<div class="mceTemp">
<dl id="attachment_3139" class="wp-caption alignnone" style="width: 494px;">
<dt class="wp-caption-dt"><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/05/1.-Typical-Multiplication.png"><img class="size-full wp-image-3139" title="Typical Multiplication" src="http://www.stoimen.com/blog/wp-content/uploads/2012/05/1.-Typical-Multiplication.png" alt="Typical Multiplication" height="518" width="484"></a></dt>
<dd class="wp-caption-dd"></dd>
</dl>
</div>
<p>We see that even for two-digit numbers this is quite difficult – we have 4 multiplications and some additions.<span id="more-3121"></span></p>
<figure id="attachment_3143" style="width: 484px;" class="wp-caption alignnone"><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/05/2.-Number-of-Multiplications.png"><img src="http://www.stoimen.com/blog/wp-content/uploads/2012/05/2.-Number-of-Multiplications.png" alt="Number of Multiplications" title="Number of Multiplications" class="size-full wp-image-3143" height="518" width="484"></a><figcaption class="wp-caption-text">We need 4 multiplications in order to calculate the product of two 2-digit numbers!</figcaption></figure>
<p>However so far we know how to multiply numbers, the only problem is that our task becomes very difficult as the numbers grow. If multiplying 65 by 97 was somehow easy, what about</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre class="php" style="font-family:monospace;"><span style="color: #cc66cc;">374773294776321</span>
x
<span style="color: #cc66cc;">222384759707982</span></pre></td></tr></tbody></table></div>

<p>It seems almost impossible.</p>
<h3>History</h3>
<p><a title="Andrey Kolmogorov" href="http://en.wikipedia.org/wiki/Andrey_Kolmogorov" target="_blank">Andrey Kolmogorov</a> is one of the brightest russian mathematicians of the 20th century. In 1960, during a seminar, Kolmogorov stated that two n-digit numbers can’t be multiplied with less than n<sup>2</sup> multiplications!<br>
Only a week later a 23-year young student called <a title="Anatolii Alexeevitch Karatsuba" href="http://en.wikipedia.org/wiki/Anatolii_Alexeevitch_Karatsuba" target="_blank">Anatolii Alexeevitch Karatsuba</a> proved that the multiplication of two n-digit numbers can be computed with n ^ lg(3) multiplications with an ingenious divide and conquer approach.</p>
<h2>Overview</h2>
<p>Basically Karatsuba stated that if we have to multiply two n-digit numbers x and y, this can be done with the following operations, assuming that B is the base of and m &lt; n.</p>
<p>First both numbers x and y can be represented as x1,x2 and y1,y2 with the following formula.</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre class="php" style="font-family:monospace;">x <span style="color: #339933;">=</span> x1 <span style="color: #339933;">*</span> B^m <span style="color: #339933;">+</span> x2 
y <span style="color: #339933;">=</span> y1 <span style="color: #339933;">*</span> B^m <span style="color: #339933;">+</span> y2</pre></td></tr></tbody></table></div>

<p>Obviously now xy will become as the following product.</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre class="php" style="font-family:monospace;">xy <span style="color: #339933;">=</span> <span style="color: #009900;">(</span>x1 <span style="color: #339933;">*</span> B^m <span style="color: #339933;">+</span> x2<span style="color: #009900;">)</span><span style="color: #009900;">(</span>y1 <span style="color: #339933;">*</span> B^m <span style="color: #339933;">+</span> y2<span style="color: #009900;">)</span> <span style="color: #339933;">=&gt;</span>
&nbsp;
a <span style="color: #339933;">=</span> x1 <span style="color: #339933;">*</span> y1
b <span style="color: #339933;">=</span> x1 <span style="color: #339933;">*</span> y2 <span style="color: #339933;">+</span> x2 <span style="color: #339933;">*</span> y1
c <span style="color: #339933;">=</span> x2 <span style="color: #339933;">*</span> y2</pre></td></tr></tbody></table></div>

<p>Finally xy will become:</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre class="php" style="font-family:monospace;">xy <span style="color: #339933;">=</span> a <span style="color: #339933;">*</span> B^2m <span style="color: #339933;">+</span> b <span style="color: #339933;">*</span> B^m <span style="color: #339933;">+</span> c</pre></td></tr></tbody></table></div>

<p>However a, b and c can be computed at least with four multiplication, which isn’t a big optimization. That is why Karatsuba came up with the brilliant idea to calculate b with the following formula:</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre class="php" style="font-family:monospace;">b <span style="color: #339933;">=</span> <span style="color: #009900;">(</span>x1 <span style="color: #339933;">+</span> x2<span style="color: #009900;">)</span><span style="color: #009900;">(</span>y1 <span style="color: #339933;">+</span> y2<span style="color: #009900;">)</span> <span style="color: #339933;">-</span> a <span style="color: #339933;">-</span> c</pre></td></tr></tbody></table></div>

<p>That make use of only three multiplications to get xy.</p>
<p>Let’s see this formula by example.</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre class="php" style="font-family:monospace;"><span style="color: #cc66cc;">47</span> x <span style="color: #cc66cc;">78</span>
&nbsp;
x <span style="color: #339933;">=</span> <span style="color: #cc66cc;">47</span>
x <span style="color: #339933;">=</span> <span style="color: #cc66cc;">4</span> <span style="color: #339933;">*</span> <span style="color: #cc66cc;">10</span> <span style="color: #339933;">+</span> <span style="color: #cc66cc;">7</span>
&nbsp;
x1 <span style="color: #339933;">=</span> <span style="color: #cc66cc;">4</span>
x2 <span style="color: #339933;">=</span> <span style="color: #cc66cc;">7</span>
&nbsp;
y <span style="color: #339933;">=</span> <span style="color: #cc66cc;">78</span>
y <span style="color: #339933;">=</span> <span style="color: #cc66cc;">7</span> <span style="color: #339933;">*</span> <span style="color: #cc66cc;">10</span> <span style="color: #339933;">+</span> <span style="color: #cc66cc;">8</span>
&nbsp;
y1 <span style="color: #339933;">=</span> <span style="color: #cc66cc;">7</span>
y2 <span style="color: #339933;">=</span> <span style="color: #cc66cc;">8</span>
&nbsp;
a <span style="color: #339933;">=</span> x1 <span style="color: #339933;">*</span> y1 <span style="color: #339933;">=</span> <span style="color: #cc66cc;">4</span> <span style="color: #339933;">*</span> <span style="color: #cc66cc;">7</span> <span style="color: #339933;">=</span> <span style="color: #cc66cc;">28</span>
c <span style="color: #339933;">=</span> x2 <span style="color: #339933;">*</span> y2 <span style="color: #339933;">=</span> <span style="color: #cc66cc;">7</span> <span style="color: #339933;">*</span> <span style="color: #cc66cc;">8</span> <span style="color: #339933;">=</span> <span style="color: #cc66cc;">56</span>
b <span style="color: #339933;">=</span> <span style="color: #009900;">(</span>x1 <span style="color: #339933;">+</span> x2<span style="color: #009900;">)</span><span style="color: #009900;">(</span>y1 <span style="color: #339933;">+</span> y2<span style="color: #009900;">)</span> <span style="color: #339933;">-</span> a <span style="color: #339933;">-</span> c <span style="color: #339933;">=</span> <span style="color: #cc66cc;">11</span> <span style="color: #339933;">*</span> <span style="color: #cc66cc;">15</span> <span style="color: #339933;">-</span> <span style="color: #cc66cc;">28</span> <span style="color: #339933;">-</span> <span style="color: #cc66cc;">56</span></pre></td></tr></tbody></table></div>

<p>Now the thing is that 11 * 15 it’s again a multiplication between 2-digit numbers, but fortunately we can apply the same rules two them. This makes the algorithm of Karatsuba a perfect example of the “divide and conquer” algorithm.</p>

<h2>Complexity</h2>
<p>Assuming that we replace two of the multiplications with only one makes the program faster. The question is how fast. Karatsuba improves the multiplication process by replacing the initial complexity of O(n<sup>2</sup>) by O(n<sup>lg3</sup>), which as you can see on the diagram below is much faster for big n.</p>
<figure id="attachment_3141" style="width: 600px;" class="wp-caption alignnone"><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/05/Karatsuba-Complexity.png"><img src="http://www.stoimen.com/blog/wp-content/uploads/2012/05/Karatsuba-Complexity.png" alt="Karatsuba Complexity" title="Karatsuba Complexity" class="size-full wp-image-3141" height="371" width="600"></a><figcaption class="wp-caption-text">O(n^2) grows much faster than O(n^lg3)</figcaption></figure>
<h2>Application</h2>
<p>It’s obvious where the Karatsuba algorithm can be used. It is very efficient when it comes to integer multiplication, but that isn’t its only advantage. It is often used for polynomial multiplications.</p>

source : http://www.stoimen.com/blog/2012/05/15/computer-algorithms-karatsuba-fast-multiplication/
