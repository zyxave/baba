#include <iostream>
#include <cstdio>
#include <cmath>
using namespace std;

int f(int n) {
	if (n == 0) return 1;
	return n * f(n-1);
}

int C(int n, int k) {
	int ans = 1;
	ans = f(n) / f(k);
	ans = ans / f(n-k);
	return ans;
}

int main () {
	int T, P, Q;
	scanf("%d", &T);
	while(T--) {
		scanf("%d %d", &P, &Q);
		for (int i = 0; i <= Q; i++) {
			int a, b, c;
			a = C(Q, Q-i);
			b = (Q-i);
			c = pow(P, i);
			if (a * c > 1) printf("%d", a * c);
			if (b > 0) printf("x");
			if (b > 1) printf("%d", b);
			//if (c > 1) printf("%d", c);
			printf(i == Q ? "\n" : " ");
		} 
	}
	return 0;
}
