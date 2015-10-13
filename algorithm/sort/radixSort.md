#PHP-radix-sort

<h2>Radix Sort</h2>
<p>The first question when we see the phrase “sorting in linear time” should be – where’s the catch? Indeed there’s a catch and the thing is that we can’t sort just anything in linear time. Most of the time we can speak on sorting integers in linear time, but as we can see later this is not the only case. </p>
<p>Since we speak about integers, we can think of a faster sorting algorithm than usual. Such an algorithm is the counting sort, which can be very fast in some cases, but also very slow in others, so it can be used carefully. Another linear time sorting algorithm is radix sort.</p>
<h2>Introduction</h2>
<p>Count sort is absolutely brilliant and easy to implement. In case we sort integers in the range [n, m] on the first pass we just initialize a zero filled array with length m-n. Than on the second pass we “count” the occurrence of each integer. On the third pass we just sort the integers with an ease. </p>
<p><img src="https://docs.google.com/drawings/pub?id=1VOyJ9u_sp5YQB6gpt0bcWFOKjYTSugoQWJYRkFFZTLc&amp;w=620&amp;h=399"></p>
<p>However we have some problems with that algorithm. What if we have only few items to sort that are very far from each other like [2, 1, 10000000, 2]. This will result in a very large unused data. So we need a dense integer sequence. This is important because we must know in advance the nature of the sequence which is rarely sure.</p>
<p>That’s why we need to use another linear time sorting algorithm for integers that doesn’t have this disadvantage. Such an algorithm is the radix sort.</p>

<h2>Overview</h2>
<p>The idea behind the radix sort is simple. We must look at our “integer” sequence as a string sequence. OK, to become clearer let me give you an example. Our sequence is [12, 2, 23, 33, 22]. First we take the leftmost digit of each number. Thus we must compare [_2, 2, _3, _3, _2]. Clearly we can assume that since the second number “2” is only a one digit number we can fill it up with a leading “0”, to become 02 or _2 in our example: [_2, _2, _3, _3, _2]. Now we sort this sequence with a stable sort algorithm.</p>
<h3>What is a Stable Sort Algorithm</h3>
<p>A stable sort algorithm is an algorithm that sorts a list by preserving the positions of the elements in case they are equal. In terms of PHP this means that:</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre class="php" style="font-family:monospace;"><span style="color: #990000;">array</span><span style="color: #009900;">(</span><span style="color: #cc66cc;">0</span> <span style="color: #339933;">=&gt;</span> <span style="color: #cc66cc;">12</span><span style="color: #339933;">,</span> <span style="color: #cc66cc;">1</span><span style="color: #339933;">=&gt;</span> <span style="color: #cc66cc;">13</span><span style="color: #339933;">,</span> <span style="color: #cc66cc;">2</span> <span style="color: #339933;">=&gt;</span> <span style="color: #cc66cc;">12</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p>Will be sorted as follows:</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre class="php" style="font-family:monospace;"><span style="color: #990000;">array</span><span style="color: #009900;">(</span><span style="color: #cc66cc;">0</span> <span style="color: #339933;">=&gt;</span> <span style="color: #cc66cc;">12</span><span style="color: #339933;">,</span> <span style="color: #cc66cc;">2</span> <span style="color: #339933;">=&gt;</span> <span style="color: #cc66cc;">12</span><span style="color: #339933;">,</span> <span style="color: #cc66cc;">1</span> <span style="color: #339933;">=&gt;</span> <span style="color: #cc66cc;">13</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p>Thus the third element becomes second following the first element. Note that the third and the first element are equal, but the third appears later in the sequence so it remains later in the sorted sequence.</p>
<p>In the radix sort example, we need a stable sort algorithm, because we need to worry about only one position of digit we explore.</p>
<p>So what happens in our example after we sort the sequence? </p>
<p><img src="https://docs.google.com/drawings/pub?id=10dVPfCVf8YI2sEJNuAujnrOx0g0RxWGsQdTJ0xqGt1k&amp;w=620&amp;h=399"></p>
<p>As we can see we’re far from a sorted sequence, but what if we proceed with the next “position” – the decimal digit?</p>
<p>Than we end up with this:</p>
<p><img src="https://docs.google.com/drawings/pub?id=1oaKToHilxrKyGJzwm7NvmrSaL3uVRO3R7r0RCb0jrR4&amp;w=621&amp;h=264"></p>
<p>Now we have a sorted sequence, so let’s summarize the algorithm in a short pseudo code.</p>

<p>Let’s say we have an array of integers which is not sorted. Just because it consists only of integers and because array keys are integers in programming languages we can implement radix sort. </p>
<p>First for each value of the input array we put the value of “1” on the key-th place of the temporary array as explained on the following diagram.</p>
<p></p><figure id="attachment_2942" style="width: 620px;" class="wp-caption alignnone"><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/03/RadixSortBasicIdea.png"><img src="http://www.stoimen.com/blog/wp-content/uploads/2012/03/RadixSortBasicIdea.png" alt="Radix sort first pass" title="Radix Sort Basic Idea" class="size-full wp-image-2942" height="399" width="620"></a><figcaption class="wp-caption-text">Radix sort first pass</figcaption></figure><span id="more-2922"></span><br>
If there are repeating values in the input array we increment the corresponding value in the temporary array. After “initializing” the temporary array with one pass (with linear complexity) we can sort the input. <p></p>
<figure id="attachment_2941" style="width: 620px;" class="wp-caption alignnone"><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/03/RadixSortBasicIdea2ndpass.png"><img src="http://www.stoimen.com/blog/wp-content/uploads/2012/03/RadixSortBasicIdea2ndpass.png" alt="Radix sort second pass" title="Radix Sort Basic Idea 2nd pass" class="size-full wp-image-2941" height="392" width="620"></a><figcaption class="wp-caption-text">Radix sort second pass</figcaption>


<h2>Pseudo Code</h2>
<p>The simple approach behind the radix sort algorithm can be described as pseudo code, assuming that we’re sorting decimal integers.</p>
<p>1. For each digit at position 10^0 to 10^n<br>
   1.1. Sort the numbers by this digit using a stable sort algorithm; </p>
<p>The thing is that here we talk about decimal, but actually this algorithm can be applied equally on any numeric systems. That is why it’s called “radix” sort. </p>
<p>Thus we can sort binary numbers, hexadecimals etc.</p>
<p>It’s important to note that this algorithm can be also used to sort strings alphabetically.</p>
<pre>[ABC, BBC, ABA, AC]
[__C, __C, __A, __C] =&gt; [ABA, ABC, BBC, AC]
[_B_, _B_, _B_, _A_] =&gt; [AC, ABA, ABC, BBC]
[___, A__, A__, B__] =&gt; [AC, ABA, ABC, BBC]
</pre>
<p>That is simply correct because we can assume that our alphabet is another 27 digit numeric system (in case of the Latin alphabet).</p>
<h2>Complexity</h2>
<p>As I said in the beginning radix sort is a linear time sorting algorithm. Let’s see why. First we depend on the numeric system. Let’s assume we have a decimal numeric system – then we have N passes sorting 10 digits which is simply 10*N. In case of K digit numeric system our algorithm will be O(K*N) which is linear.</p>
<p>However you must note that in case we sort N numbers in an N digit numeric system the complexity will become O(N^2)!</p>
<p>We must also remember that in order to implement radix sort and a supporting stable sort algorithm we need an extra space.</p>

The complexity of radix sort is linear, which in terms of omega means O(n). That is a great benefit in performance compared to O(n.log(n)) or even worse with O(n<sup>2</sup>) as we can see on the following chart.</p>
<figure id="attachment_2940" style="width: 600px;" class="wp-caption alignnone"><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/03/RadixSortComplexity.png"><img src="http://www.stoimen.com/blog/wp-content/uploads/2012/03/RadixSortComplexity.png" alt="Linear function compared to n.log(n) and n^2" title="Radix Sort Complexity" class="size-full wp-image-2940" height="371" width="600"></a><figcaption class="wp-caption-text">Linear function compared to n.log(n) and n^2</figcaption>


<h2>Application</h2>
<p>Sorting integers can be faster than sorting just anything, so any time we need to implement a sorting algorithm we must carefully investigate the input data. And that’s also the big disadvantage of this algorithm – we must know the input in advance, which is rarely the case.</p>

<h2>Why using radix sort</h2>
<h3>1. It’s fast</h3>
<p>Radix sort is very fast compared to other sorting algorithms as we saw on the diagram above. This algorithm is very useful in practice because in practice we often sort sets of integers.</p>
<figure id="attachment_2939" style="width: 620px;" class="wp-caption alignnone"><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/03/Prosofradixsort.png"><img src="http://www.stoimen.com/blog/wp-content/uploads/2012/03/Prosofradixsort.png" alt="Pros of radix sort" title="Pros of radix sort" class="size-full wp-image-2939" height="399" width="620"></a><figcaption class="wp-caption-text"> </figcaption></figure>
<h3>2. It’s easy to understand and implement</h3>
<p>Even a beginner can understand and implement radix sort, which is great. You need no more than few loops to implement it.</p>
<h2>Why NOT using radix sort</h2>
<h3>1. Works only with integers</h3>
<p>If you’re not sure about the input better do not use radix sort. We may think that our input consists only of integers and we can go for radix sort, but what if in the future someone passes floats or strings to our routine.</p>
<figure id="attachment_2938" style="width: 621px;" class="wp-caption alignnone"><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/03/Consofradixsort.png"><img src="http://www.stoimen.com/blog/wp-content/uploads/2012/03/Consofradixsort.png" alt="Cons of radix sort" title="Cons of radix sort" class="size-full wp-image-2938" height="407" width="621"></a><figcaption class="wp-caption-text"> </figcaption></figure>
<h3>2. Requires additional space</h3>
<p>Radix sort needs additional space – at least as much as the input.</p>
<h2>Final Words</h2>
<p>Radix sort is restricted by the input’s domain, but I must say that in practice there are tons of cases where only integers are sorted. This is when we get some data from the db based on primary keys – typically primary in database tables are integers as well. So practically there are lots of cases of sorting integers, so radix sort may be one very, very useful algorithm and it is so cool that it is also easy to implement.</p>
