#include <bits/stdc++.h>
using namespace std;

int main ()
{
	int t;
	scanf("%d",&t);
	int n;
	for (int T=0;T<t;T++){
		scanf("%d",&n);
		int a[n+1];
		for (int i=1; i<=n; i++){
			scanf("%d",&a[i]);
		}
		long long res=0;
		for (int i=1; i<=n; i++){
			res = res + a[i];
		}
		if (res % 3 != 0){
			printf("No\n");
		}
		else printf("Yes\n");
	}	
	return 0;	
}
