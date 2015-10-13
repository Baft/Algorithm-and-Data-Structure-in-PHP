#PHP-bubble-sort

<h2>Overview</h2>
<p>It’s weird that bubble sort is the most famous sorting algorithm in practice since it is one of the worst approaches for data sorting. Why is bubble sort so famous? Perhaps because of its exotic name or because it is so easy to implement. First let’s take a look on its nature.</p>
<p>Bubble sort consists of comparing each pair of adjacent items. Then one of those two items is considered smaller (lighter) and if the lighter element is on the right side of its neighbour, they swap places. Thus the lightest element bubbles to the surface and at the end of each iteration it appears on the top. I’ll try to explain this simple principle with some pictures.</p>
<h3>1. Each two adjacent elements are compared</h3>
<figure id="attachment_2736" style="width: 962px;" class="wp-caption alignnone"><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/02/BubbleSortStep1CompareTwoElements1.png"><img src="http://www.stoimen.com/blog/wp-content/uploads/2012/02/BubbleSortStep1CompareTwoElements1.png" alt="In bubble sort we've to compare each two adjacent elements" title="BubbleSortStep1CompareTwoElements" class="size-full wp-image-2736" height="250" width="962"></a><figcaption class="wp-caption-text">In bubble sort we've to compare each two adjacent elements</figcaption></figure>
<p>Here “2” appears to be less than “4”, so it is considered lighter and it continues to bubble to the surface (the front of the array).<br>
<span id="more-2729"></span></p>
<h3>2. Swap with heavier elements</h3>
<figure id="attachment_2738" style="width: 962px;" class="wp-caption alignnone"><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/02/BubbleSortStep2AnElementStartstoBubble.png"><img src="http://www.stoimen.com/blog/wp-content/uploads/2012/02/BubbleSortStep2AnElementStartstoBubble.png" alt="If heavier elements appear on the way we should swap them" title="BubbleSortStep2AnElementStartstoBubble" class="size-full wp-image-2738" height="241" width="962"></a><figcaption class="wp-caption-text">If heavier elements appear on the way we should swap them</figcaption></figure>
<p>On his way to the surface the currently lightest item meets a heavier element. Then they swap places.</p>
<h3>3. Move forward and swap with each heavier item</h3>
<figure id="attachment_2740" style="width: 963px;" class="wp-caption alignnone"><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/02/BubbleSortStep3ALighterElementStartstoBubble.png"><img src="http://www.stoimen.com/blog/wp-content/uploads/2012/02/BubbleSortStep3ALighterElementStartstoBubble.png" alt="Swapping is slow and that is the main reason not to use bubble sort" title="BubbleSortStep3ALighterElementStartstoBubble" class="size-full wp-image-2740" height="377" width="963"></a><figcaption class="wp-caption-text">Swapping is slow and that is the main reason not to use bubble sort</figcaption></figure>
<p>The problem with bubble sort is that you may have to swap a lot of elements.</p>
<h3>4. If there is a lighter element, then this item begins to bubble to the surface</h3>
<figure id="attachment_2741" style="width: 959px;" class="wp-caption alignnone"><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/02/BubbleSortStep4ALighterElementStartstoBubble.png"><img src="http://www.stoimen.com/blog/wp-content/uploads/2012/02/BubbleSortStep4ALighterElementStartstoBubble.png" alt="We can be sure that on each step the algorithm bubbles the lightest element so far" title="BubbleSortStep4ALighterElementStartstoBubble" class="size-full wp-image-2741" height="180" width="959"></a><figcaption class="wp-caption-text">We can be sure that on each step the algorithm bubbles the lightest element so far</figcaption></figure>
<p>If the currently lightest element meets another item that is lighter, then the newest currently lightest element starts to bubble to the top.</p>
<h3>5. Finally the lightest element is on its place</h3>
<figure id="attachment_2742" style="width: 959px;" class="wp-caption alignnone"><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/02/BubbleSortStep5Themostlightelementisonitsplace.png"><img src="http://www.stoimen.com/blog/wp-content/uploads/2012/02/BubbleSortStep5Themostlightelementisonitsplace.png" alt="Finally the list begins to look sorted" title="BubbleSortStep5Themostlightelementisonitsplace" class="size-full wp-image-2742" height="180" width="959"></a><figcaption class="wp-caption-text">Finally the list begins to look sorted</figcaption></figure>
<p>At the end of each iteration we can be sure that the lightest element is on the right place – at the beginning of the list.</p>
<p>The problem is that this algorithm needs a tremendous number of comaprisons and as we know already this can be slow.</p>
<p><iframe src="https://docs.google.com/present/embed?id=dc7ft52d_9cgbm35fh&amp;autoStart=true&amp;loop=true&amp;size=m" frameborder="0" height="420" width="525"></iframe></p>
<p>We can easily see how ineffective bubble sort is. Now the question remains – why is it so famous? Maybe indeed the answer lies in the simplicity of its implementation. Let’s see how to implement bubble sort.</p>

<h2>Complexity: Where’s Bubble Sort Compared to Other Sorting Algorithms</h2>
<p>Compared to other sorting algorithm, bubble sort is really slow. Indeed the complexity of this algoritm is O(n<sup>2</sup>) which can’t be worse. It’s weird that the most well known sorting algorithm is the slowest one.</p>
<figure id="attachment_2758" style="width: 600px;" class="wp-caption alignnone"><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/02/BubbleSortComparedToOthers.png"><img src="http://www.stoimen.com/blog/wp-content/uploads/2012/02/BubbleSortComparedToOthers.png" alt="Bubble sort compared to quicksort, merge sort and heapsort in the average case" title="BubbleSortComparedToOthers" class="size-full wp-image-2758" height="371" width="600"></a><figcaption class="wp-caption-text">Bubble sort compared to quicksort, merge sort and heapsort in the average case</figcaption></figure>
<p>Even for small values of n, the number of comparisons and swaps can be tremendous.</p>
<figure id="attachment_2751" style="width: 1082px;" class="wp-caption alignnone"><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/02/BubbleSortStats-2.png"><img src="http://www.stoimen.com/blog/wp-content/uploads/2012/02/BubbleSortStats-2.png" alt="stats" title="Bubble sort is three times slower than quicksort even for n = 100, but it's easier to impelemnt" class="size-full wp-image-2751" height="654" width="1082"></a><figcaption class="wp-caption-text">Bubble sort is three times slower than quicksort even for n = 100, but it's easier to impelemnt</figcaption></figure>
<p>Another problem is that most of the languages (libraries) have built-in sorting functions, that they don’t make use of bubble sort and are faster for sure. So why a developer should implement bubble sort at all?</p>
<h2>Application: 3 Cool Reasons To Use Bubble Sort</h2>
<p>We saw that bubble sort is slow and ineffective, yet it is used in practice. Why? Is there any reason to use this slow, ineffective algorithm with weird name? Yes and here are some of them that might be helpful for any developer.</p>
<h3>1. It is easy to implement</h3>
<p>Definitely bubble sort is easier to implement than other “complex” sorting algorithms as quicksort. Bubble sort is easy to remember and easy to code and that’s great instead of learning and remembering tons of code.</p>
<h3>2. Because the library can’t help</h3>
<p>Let’s say you work with JavaScript. Great, there you get array.sort() which can help for this: [3, 1, 2].sort(). But what would happen if you’d rather like to sort more “complex” structures like … some DOM nodes. Here we have three LI nodes and we want to sort them in some order. Obviously you can’t compare them with the “&lt;" operator, so we've to come up with some custom solution.



</p><div class="wp_syntax"><table><tbody><tr><td class="code"><pre class="html4strict" style="font-family:monospace;"><span style="color: #009900;">&lt;<span style="color: #000000; font-weight: bold;">a</span> <span style="color: #000066;">href</span><span style="color: #66cc66;">=</span><span style="color: #ff0000;">"#"</span>&gt;</span>Click here to sort the list<span style="color: #009900;">&lt;<span style="color: #66cc66;">/</span><span style="color: #000000; font-weight: bold;">a</span>&gt;</span>
&nbsp;
<span style="color: #009900;">&lt;<span style="color: #000000; font-weight: bold;">li</span>&gt;</span>node 3<span style="color: #009900;">&lt;<span style="color: #66cc66;">/</span><span style="color: #000000; font-weight: bold;">li</span>&gt;</span>
<span style="color: #009900;">&lt;<span style="color: #000000; font-weight: bold;">li</span>&gt;</span>node 1<span style="color: #009900;">&lt;<span style="color: #66cc66;">/</span><span style="color: #000000; font-weight: bold;">li</span>&gt;</span>
<span style="color: #009900;">&lt;<span style="color: #000000; font-weight: bold;">li</span>&gt;</span>node 2<span style="color: #009900;">&lt;<span style="color: #66cc66;">/</span><span style="color: #000000; font-weight: bold;">li</span>&gt;</span></pre></td></tr></tbody></table></div>

<p>Here sort() can’t help us and we’ve to code our own function. However we have only few elements (three in our case). Why not using bubble sort?</p>
<h3>3. The list is almost sorted</h3>
<p>One of the problems with bubble sort is that it consists of too much swapping, but what if we know that the list is almost sorted?</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre class="javascript" style="font-family:monospace;"><span style="color: #006600; font-style: italic;">// almost sorted</span>
<span style="color: #009900;">[</span><span style="color: #CC0000;">1</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">2</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">4</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">3</span><span style="color: #339933;">,</span> <span style="color: #CC0000;">5</span><span style="color: #009900;">]</span></pre></td></tr></tbody></table></div>

<p>We have to swap only 3 with 4. </p>
<p>Note that in the best case bubble sort’s complexity is O(n) – faster than quicksort’s best case!</p>

source : http://www.stoimen.com/blog/2012/02/20/computer-algorithms-bubble-sort/
