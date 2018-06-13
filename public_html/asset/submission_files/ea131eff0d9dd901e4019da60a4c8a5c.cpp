#include <iostream>
#include <cstdio>
#include <math.h>
using namespace std;

int main () {
	int test;
	scanf ("%d", &test);
	while (test--) {
		int p, a, m, r, b;
		int c=0;
		scanf ("%d %d %d %d", &p, &a, &m, &r);
		r-=p;
		if (r>0) (c++);
		while (p>=m)  {
			p-=a;
			if (p<m) (p=m);
			r-=p;
			if (r>=0) (c++);
			if (r<=0) break;
		}
		printf("%d\n", c);
	}
	return 0;
}
