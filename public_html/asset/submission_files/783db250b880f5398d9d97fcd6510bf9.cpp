#include<bits/stdc++.h>
using namespace std;

int tc,awal,kurang,batas,uang;

int main()
{
	cin >> tc;
	while(tc--)
	{
		cin >> awal >> kurang >> batas >> uang;
		int ans = 0;
		while(uang > 0)
		{
			ans++;
			uang = uang - max(awal,batas);
			if(uang < 0) ans--;
			awal = awal - kurang;
		}
		printf("%d\n",ans);
	}
}
