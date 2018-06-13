#include <iostream>
#include <cstdio>
using namespace std;

int T, jml, p, a, m, r;

int main () {
	scanf("%d", &T);
	while (T--) {
		jml = 0;
		scanf("%d %d %d %d", &p, &a, &m, &r);
		while (r - p >= 0) {
			r = r - p;
			jml++;
			if (p - a >= m) {
				p = p - a;
			} else {
				p = m;
			}
		}
		printf("%d\n", jml);
	}
	return 0;
}
