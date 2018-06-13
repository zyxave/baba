#include <iostream>
#include <stdio.h>
#include <algorithm>
#include <math.h>
#include <string>
#include <string.h>

using namespace std;

int main() {
	
	int prime[11] = {2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31};
	
	int t;
	scanf("%d", &t);
	while (t--) {
		int n, k;
		scanf("%d%d", &n, &k);
		int o = 0;
		for (int a = 0; a < 11; a++) {
			int ta = prime[a];
			if (k > 1) {
				for (int b = a+1; b < 11; b++) {
					int tb = ta + prime[b];
					if (k > 2) {
						
				for (int c = b+1; c < 11; c++) {
					int tc = tb + prime[c];
					if (k > 3) {
						
				for (int d = c+1; d < 11; d++) {
					int td = tc + prime[d];
					if (k > 4) {
						
				for (int e = d+1; e < 11; e++) {
					int te = td + prime[e];
					if (k > 5) {
						
				for (int f = e+1; f < 11; f++) {
					int tf = te + prime[f];
					if (k > 6) {
						
				for (int g = f+1; g < 11; g++) {
					int tg = tf + prime[g];
					if (k > 7) {
						
				for (int h = g+1; h < 11; h++) {
					int th = tg + prime[h];
					if (k > 8) {
						
				for (int i = h+1; i < 11; i++) {
					int ti = th + prime[i];
					if (k > 9) {
						
				for (int j = i+1; j < 11; j++) {
					int tj = ti + prime[j];
					if (k > 10) {
						
				for (int kz = j+1; kz < 11; kz++) {
					int tk = tj + prime[kz];
					if (k > 11) {
						
				for (int l = kz+1; l < 11; l++) {
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
