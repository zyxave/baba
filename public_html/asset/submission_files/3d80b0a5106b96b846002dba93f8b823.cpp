#include <iostream>
#include <stdio.h>
#include <algorithm>
#include <math.h>
#include <string>
#include <string.h>

using namespace std;

int main() {
	
	bool primex[1000];
	memset(primex, true, sizeof(primex));
	primex[0] = primex[1] = false;
	int primen = 0;
	for (int i = 2; i < 1000; i++) {
		if (primex[i]) {
			primen++;
			for (int j = i+i; j < 1000; j += i) {
				primex[j] = false;
			}
		}
	}
	int prime[primen];
	int index = 0;
	for (int i = 2; i < 1000; i++) {
		if (primex[i]) {
			prime[index] = i;
			index++;
		}
	}
	
	int t;
	scanf("%d", &t);
	while (t--) {
		int n, k;
		scanf("%d%d", &n, &k);
		int o = 0;
		for (int a = 0; a < primen; a++) {
			int ta = prime[a];
			if (k > 1) {
				for (int b = a+1; b < primen; b++) {
					int tb = ta + prime[b];
					if (k > 2) {
						
				for (int c = b+1; c < primen; c++) {
					int tc = tb + prime[c];
					if (k > 3) {
						
				for (int d = c+1; d < primen; d++) {
					int td = tc + prime[d];
					if (k > 4) {
						
				for (int e = d+1; e < primen; e++) {
					int te = td + prime[e];
					if (k > 5) {
						
				for (int f = e+1; f < primen; f++) {
					int tf = te + prime[f];
					if (k > 6) {
						
				for (int g = f+1; g < primen; g++) {
					int tg = tf + prime[g];
					if (k > 7) {
						
				for (int h = g+1; h < primen; h++) {
					int th = tg + prime[h];
					if (k > 8) {
						
				for (int i = h+1; i < primen; i++) {
					int ti = th + prime[i];
					if (k > 9) {
						
				for (int j = i+1; j < primen; j++) {
					int tj = ti + prime[j];
					if (k > 10) {
						
				for (int kz = j+1; kz < primen; kz++) {
					int tk = tj + prime[kz];
					if (k > 11) {
						
				for (int l = kz+1; l < primen; l++) {
					int tl = tk + prime[l];
					if (tl == n) {
						o++;
					}
				}
					} else if (tk == n) {
						o++;
					}
				}
					} else if (tj == n) {
						o++;
					}
				}
					} else if (ti == n) {
						o++;
					}
				}
					} else if (th == n) {
						o++;
					}
				}
					} else if (tg == n) {
						o++;
					}
				}
					} else if (tf == n) {
						o++;
					}
				}
					} else if (te == n) {
						o++;
					}
				}
					} else if (td == n) {
						o++;
					}
				}
					} else if (tc == n) {
						o++;
					}
				}
					} else if (tb == n) {
						o++;
					}
				}
			} else if (ta == n) {
				o++;
			}
		}
		printf("%d\n", o);
	}
}
