/** @type {import('tailwindcss').Config} */
module.exports = {
	content : [
		"modules/**/resources/views/**/*.blade.php",
		"modules/**/resources/js/**/*.vue",
		"resources/views/**/*.blade.php",
		"resources/js/**/*.vue",
	],
	theme   : {
		extend : {
			colors : {
				// 主色调 - 基于 #F2AD09
				primary : {
					DEFAULT : '#ffe60f',
					50      : '#fffbeb',
					100     : '#fef3c7',
					200     : '#fde68a',
					300     : '#fcd34d',
					400     : '#fbbf24',
					500     : '#ffe60f',
					600     : '#d97706',
					700     : '#b45309',
					800     : '#92400e',
					900     : '#78350f',
				},
				// 次要色 - 灰色系
				secondary : {
					50  : '#f8fafc',
					100 : '#f1f5f9',
					200 : '#e2e8f0',
					300 : '#cbd5e1',
					400 : '#94a3b8',
					500 : '#64748b',
					600 : '#475569',
					700 : '#334155',
					800 : '#1e293b',
					900 : '#0f172a',
				},
				// 成功色
				success : {
					500 : '#22c55e',
					600 : '#16a34a',
					700 : '#15803d',
				},
				// 警告色
				warning : {
					500 : '#f59e0b',
					600 : '#d97706',
				},
				// 错误色
				danger : {
					500 : '#ed4f4f',
					600 : '#dc2626',
					700 : '#b91c1c',
				},
			},
		},
	},
	plugins : [],
}

