#include <iostream>
#include <stdio.h>
#include <algorithm>
#include <math.h>
#include <string>
#include <string.h>

using namespace std;

int main() {
	int t;
	scanf("%d", &t);
	while (t--) {
		int n, m, q;
		scanf("%d%d%d", &n, &m, &q);
		int x = q+1;
		int y = q+1;
		int ax[q];
		int ay[q];
		memset(ax, 0, sizeof(ax));
		memset(ay, 0, sizeof(ay));
		for (int i = 0; i < q; i++) {
			scanf("%d%d", &ax[i], &ay[i]);
			if (ax[i] == 1 || ax[i] == n) x--;
			if (ay[i] == 1 || ay[i] == n) y--;
			if (i < q-1) {
				for (int j = i+1; j < q; j++) {
					if (ax[i] == ax[j] && ax[i] != 1 && ax[i] != n) {
						x--;
					}
					if (ay[i] == ay[j] && ay[i] != 1 && ay[i] != n) {
						y--;
					}
				}
			}
		}
		x *= y;
		for (int i = 0; i < q; i++) {
			for (int j = i+1; j < q-1; j++) {
				if (ax[i] > ax[j]) {
					int asd = ax[j];
					ax[j] = ax[j+1];
					ax[j+1] = asd;
				}
				if (ay[i] > ay[j]) {
					int asd = ay[j];
					ay[j] = ay[j+1];
					ay[j+1] = asd;
				}
			}
		}
		int dx[q+1];
		int dy[q+1];
		dx[0] = ax[0]-1;
		dy[0] = ay[0]-1;
		for (int i = 1; i < q; i++) {
			dx[i] = ax[i] - ax[i-1];
			dy[i] = ay[i] - ay[i-1];
		}
		dx[q] = n - ax[q-1];
		dy[q] = m - ay[q-1];
		
		int maxx = 0, maxy = 0;
		int minx, miny;
		bool sx = false;
		bool sy = false;
		for (int i = 0; i < q+1; i++) {
			if (dx[i] == 0) continue;
			maxx = max(maxx, dx[i]);
			if (sx) {
				minx = min(minx, dx[i]);
			} else {
				sx = true;
				minx = dx[i];
			}
		}
		for (int i = 0; i < q+1; i++) {
			if (dy[i] == 0) continue;
			maxy = max(maxy, dy[i]);
			if (sy) {
				miny = min(miny, dy[i]);
			} else {
				sy = true;
				miny = dy[i];
			}
		}
		minx *= miny;
		maxx *= maxy;
		printf("%d %d %d\n", x, minx, maxx);
	}
}
